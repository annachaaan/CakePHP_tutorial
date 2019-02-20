<?php
App::uses('AppController', 'Controller');
class PostsController extends AppController {
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
           return true;
        }

        // 投稿のオーナーは編集削除ができる
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            // isOwnedByメソッドはPost.phpに記載
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public $components = array('Search.Prg');
    public $presetVars = true;
    public $paginate = array();

    public $helpers = array('Html', 'Form');

    // PostsコントローラでCategoryモデルを使いたいんだ〜の呪文
    // $this->loadModel('Category');
    // ↑も同等
    public $uses = ['Post', 'Category', 'Tag', 'Attachment'];

    public function index() {
        $user = $this->Auth->user();
        $this->set('user', $user);
        // set() を使って、コントローラからビューにデータを渡す
        // Categoryテーブルのid順に投稿が並んでしまうので order で並び順指定
        $this->set('posts', $this->Post->find('all', array(
            'order' => array('Post.created' => 'asc')
        )));
    }

    public function find() {
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        $this->Prg->commonProcess();
        $this->paginate = array(
            'conditions' => $this->Post->parseCriteria($this->passedArgs));

        $this->set('posts', $this->paginate());
        $categoryId = $this->Post->Category->find('list');
        $this->set(compact('categoryId'));
    }

    public function view($id = null) {
        if (!$id) {
            // エラーを投げるのでthrow
            // ここだけ多言語対応してる(__('...'))
            throw new NotFoundException(__('Invalid post'));
        }

        // 一つの投稿記事を取得するので、afindByID()を使用
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $user = $this->Auth->user();
        $this->set('user', $user);
        $this->set('post', $post);
    }

    public function add() {
        // Categoryモデルを持ってくる
        $uses;
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        $this->set('tags', $this->Tag->find('list', array(
            'fields' => 'id, tagSlug',
        )));
        // $this->request->is()はリクエストメソッドを指定する一つの引数を持つ
        // ポストされたデータの内容をチェックするためのものではない
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

// こっからimgのサンプルテスト
            // $attachment = $this->request->data['Attachment'][0]['file_name'];
            // if ($attachment['error'] != 0) {
            //     unset($this->request->data['Attachment'][0]);
            // }
// ここまで成功なのであとはforeachでまとめちゃう
            $i = 0;
            foreach ($this->request->data['Attachment'] as $attachment) {
                if ($attachment['file_name']['error'] != 0) {
                    unset($this->request->data['Attachment'][$i]);
                } elseif ($attachment['file_name']['error'] == 4) {
                    $matekora = "このファイルはアップロードできません。";
                } else {
                    $this->request->data['Attachment'][$i]['index_num'] = $i;
                    // debug($attachment['index_num']);
                    // exit;
                }
                $i++;
            }
            // debug($this->request->data);
            // exit;

            if ($this->Post->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->success(__('Your post has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        // Categoryモデルを持ってくる
        $uses;
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        $this->set('tags', $this->Tag->find('list', array(
            'fields' => 'id, tagSlug',
        )));
        $this->set('post', $post);

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id, $cascade = true) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id, true)) {
            $this->Flash->success(__('The post with id: %s has been deleted.', h($id)));
            $sql = 'UPDATE posts_tags SET deleted = 1, deleted_date = NOW() WHERE post_id = ' . $id;
            $this->Tag->query($sql);
            $this->autoRender = false;
        } else {
            $this->Flash->error(__('The post with id: %s cloud not be deleted.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
