<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        // set() を使って、コントローラからビューにデータを渡す
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        // 一つの投稿記事を取得するので、afindByID()を使用
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Indalid post'));
        }
        $this->set('post', $post);
    }
}
