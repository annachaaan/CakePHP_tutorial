<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        // set() を使って、コントローラからビューにデータを渡す
        $this->set('posts', $this->Post->find('all'));
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
            throw new NotFoundException(__('Indalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        // $this->request->is()はリクエストメソッドを指定する一つの引数を持つ
        // ポストされたデータの内容をチェックするためのものではない
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
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
}
