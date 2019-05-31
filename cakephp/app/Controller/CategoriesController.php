<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete') {
           return true;
        }
        return parent::isAuthorized($user);
    }

    public $uses = ['Category', 'Tag', 'Post', 'Attachment', 'PostsTag'];

    public $layout = "main";

    public function index() {
        
        $this->set('categories', $this->paginate());
    }

    public function add() {
        // 新規カテゴリー作成
        // 対応するタグを選択
        // 新規タグを作成することも可能

        if ($this->request->is('post')) {
            $this->Category->create();

            foreach ($this->request->data['Tag'] as $key => $tag) {
                if (!($tag['tag'])) {
                    unset($this->request->data['Tag'][$key]);
                }
            }

            if ($this->Category->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->set('カテゴリー：'.$this->request->data['Category']['category'], array(
                    'element' => 'success'));
                return $this->redirect(array('controller' => 'Categories', 'action' => 'index'));
            }
            $this->Flash->set('入力欄を確認してください', array(
                'element' => 'error'));
        }
    }

    public function edit($id = null) {
        // $ifがない場合
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
        $this->set('category', $category);

        // $categoryがない場合
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;

            foreach ($this->request->data['Tag'] as $key => $tag) {
                if (isset($tag['deleted'])) {
                    if ($tag['deleted'] == 1) {
                        $tag_id = $category['Tag'][$key];
                        $this->Tag->delete($tag_id);
                        unset($this->request->data['Tag'][$key]);
                    } 
                } else {
                    if (!($tag['tag'])) {
                        unset($this->request->data['Tag'][$key]);
                    }
                }

            }

            if ($this->Category->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->set($this->request->data['Category']['category'].'：カテゴリー内容が更新されました', array(
                    'element' => 'success'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->set('更新内容を確認してください', array(
                'element' => 'error'));
        }

        // 内容を更新しない
        if (!$this->request->data) {
            $this->request->data = $category;
        }
    }

    public function delete($id = null, $cascade = true) {
        // カテゴリーを削除
        // タグは削除されない
        // タグ削除機能はまた別で作る！

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Category->delete($id, true)) {

            // Tag
            $tag_sql = 'UPDATE tags SET deleted = 1, deleted_date = NOW() WHERE category_id = ' . $id;
            $this->Tag->query($tag_sql);
            // Post
            $posts_sql = 'UPDATE posts SET deleted = 1, deleted_date = NOW() WHERE category_id = ' . $id;
            $this->Post->query($posts_sql);

            $post_ids_sql = "select posts.id from posts 
            where category_id = {$id};";
            $ids = $this->Post->query($post_ids_sql);
            // debug($ids[0]['posts']['id']);
            // exit;

            foreach ($ids as $key => $id) {
                $id = $id['posts']['id'];
                // debug($id);
                // exit;

                // Attathment削除
                $attachment_sql = 'UPDATE attachments SET deleted = 1, deleted_date = NOW() WHERE post_id = ' . $id;
                $this->Attachment->query($attachment_sql);

                // Posts_tag削除
                $posts_tag_sql = 'UPDATE posts_tags SET deleted = 1, deleted_date = NOW() WHERE post_id = ' . $id;
                $this->PostsTag->query($posts_tag_sql);
            }

            // $this->request->data['Category']['category'] viewににこれが表示されない
            $this->Flash->set('カテゴリーを削除しました', array(
                'element' => 'success'));
                $this->autoRender = false;
        } else {
            $this->Flash->set('削除できませんでした', array(
                'element' => 'error'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    // 選択されたカテゴリーから、選択可能範囲のタグを返す
    public function ajax() {
        $this->autoRender = false;

        // ajax通信のみ許可
        if ($this->request->is('ajax')) {
            if (isset($this->request->data['categoryId'])) {
                // 選択したカテゴリー情報を$PostCategoryIdへ
                $categoryId = $this->request->data['categoryId'];

                $categoryTag = $this->Category->query("
                    select tags.id, tags.tag from tags 
                    where category_id = {$categoryId}
                    and deleted = 0;"
                );

                // 取得した配列を日本語対応JSON型にチェンジ
                $json_change = json_encode($categoryTag, JSON_UNESCAPED_UNICODE);
                echo $json_change;
                exit;
            } else {
                echo 'FAIL TO AJAX REQUEST';
            }
        }
    }
}