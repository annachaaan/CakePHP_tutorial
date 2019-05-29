<?php
App::uses('AppController', 'Controller');
class PostsController extends AppController {

    public $layout = "main";

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
    public $presetVars = array(
        'category_id' => array('type' => 'value'),
        'tag_id' => array('type' => 'value'),
        'title' => array('type' => 'value'),
    );
    public $helpers = array('Html', 'Form');

    // `Postモデル以外のモデルを使いたいんだ〜の呪文
    public $uses = ['Post', 'Category', 'Tag', 'Attachment'];

    public function index() {
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        $this->set('tags', $this->Tag->find('list', array(
            'fields' => 'id, tag',
        )));
        $this->Prg->commonProcess();

        $this->paginate = array(
            'limit' => 5,
            'conditions' => $this->Post->parseCriteria($this->passedArgs),
            'joins' => array(
                array(
                    'table' => 'posts_tags',
                    'alias' => 'PostsTag',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Post.id = PostsTag.post_id'
                    )
                ),
                array(
                    'table' => 'tags',
                    'alias' => 'Tag',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'PostsTag.tag_id = Tag.id'
                    )
                ),
            ),
            'order' => array('Post.created DESC'),
            // '2'にしないとCategoryが見れなくなる
            'recursive' => 2,
            // Postのもつtag分だけ重複するからfieldsでなくす設定
            'fields' => array(
                'DISTINCT *',
            )
        );

        $this->set('posts', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        $this->set('tags', $this->Tag->find('list', array(
            'fields' => 'id, tag',
        )));

        // 一つの投稿記事を取得するので、afindByID()を使用
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
        // viewで表示するimageリスト
        $this->set('attachment_list', $this->Attachment->find('all', array(
            'conditions' => array('Post.id' => $id),
            // 'fields' => array('Attachment')にしようと思ったら、なぜか'Attachment.Attachmentになるので空にしたらいけた'
            'fields' => array('')
        )));
    }

    public function add() {
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));
        // $this->request->is()はリクエストメソッドを指定する一つの引数を持つ
        // ポストされたデータの内容をチェックするためのものではない
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
// ここのif文ちょっとおかしいので頭が正常になったら直す
            $i = 0;
            foreach ($this->request->data['Attachment'] as $key => $attachment) {
                if ($attachment['file_name']['error'] == 4) {
                    unset($this->request->data['Attachment'][$key]);
                } elseif ($attachment['file_name']['error'] == 0) {
                    $this->request->data['Attachment'][$key]['index_num'] = $i;
                    $i++;
                } else {
                    $matekora = "このファイルはアップロードできません。";
                    unset($this->request->data['Attachment'][$key]);
                }
            }
            // 画像ファイルがどこにinputされていても、インデックスが0から連番になるように配列を詰める
            $this->request->data['Attachment'] = array_values($this->request->data['Attachment']);

            if ($this->Post->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->set('記事が投稿されました！', array(
                    'element' => 'success'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('入力欄を確認してください', array(
                'element' => 'error'));
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

        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));

        // 初期に選択されているカテゴリー内で選択できるタグを表示
        $this->set('tags', $this->Tag->find('list', array(
            'fields' => 'id, tag',
            'conditions' => array(
                'Tag.category_id' => $post['Category']['id']
            ),
        )));

        // viewで表示するimageリスト
        $attachment_list = $this->Attachment->find('all', array(
            'conditions' => array(
                'Post.id' => $id,
                'Attachment.deleted' => 0
            ),
            // 'fields' => array('Attachment')にしようと思ったら、なぜか'Attachment.Attachmentになるので空にしたらいけた'
            'fields' => array('')
        ));
        $this->set('post', $post);
        $this->set('attachment_list', $attachment_list);

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;

            foreach ($this->request->data['Attachment'] as $key => $attachment) {
                if ($attachment_list != null) {
                    foreach ($attachment_list as $key_list => $att_list) {
                        if ($key == $att_list['Attachment']['index_num']) {
                            if (isset($attachment['deleted'])) {
                                $this->Attachment->delete($attachment['id']);
                                unset($this->request->data['Attachment'][$key]);
                            }
                        } elseif (isset($attachment['file_name'])) {
                            if ($attachment['file_name']['error'] == 4) {
                                unset($this->request->data['Attachment'][$key]);
                            } elseif ($attachment['file_name']['error'] == 0) {
                                $this->request->data['Attachment'][$key]['index_num'] = $key;
                            } else {
                                $matekora = "このファイルはアップロードできません。";
                                unset($this->request->data['Attachment'][$key]);
                            }
                        }
                    }
                } else {
                    if (isset($attachment['file_name'])) {
                        if ($attachment['file_name']['error'] == 4) {
                            unset($this->request->data['Attachment'][$key]);
                        } elseif ($attachment['file_name']['error'] == 0) {
                            $this->request->data['Attachment'][$key]['index_num'] = $key;
                        } else {
                            $matekora = "このファイルはアップロードできません。";
                            unset($this->request->data['Attachment'][$key]);
                        }
                    } else {
                        unset($this->request->data['Attachment'][$key]);
                    }
                }
            }

            $this->request->data['Attachment'] = array_values($this->request->data['Attachment']);
            foreach ($this->request->data['Attachment'] as $key => $imgIndex) {
                $this->request->data['Attachment'][$key]['index_num'] = $key;
            }

            if ($this->Post->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->set($this->request->data['Post']['title'].'：記事が更新されました', array(
                    'element' => 'success'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('更新内容を確認してください', array(
                'element' => 'error'));
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
            $this->Flash->set($this->request->data['Post']['title'].'：記事を削除しました', array(
                'element' => 'success'));

            // ここクソダサいのでなんとかしたい
            $attachment_sql = 'UPDATE attachments SET deleted = 1, deleted_date = NOW() WHERE post_id = ' . $id;
            $this->Tag->query($attachment_sql);
            $this->autoRender = false;
        } else {
            $this->Flash->set('削除できませんでした', array(
                'element' => 'error'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
