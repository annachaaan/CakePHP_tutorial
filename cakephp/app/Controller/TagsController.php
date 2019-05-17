<?php
App::uses('AppController', 'Controller');
class TagsController extends AppController {
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete') {
           return true;
        }
        return parent::isAuthorized($user);
    }

    public $uses = ['Category', 'Tag'];

    public $layout = "main";

    public function add() {
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));

        if ($this->request->is('post')) {
            $this->Tag->create();

            if ($this->Tag->saveAll($this->request->data, array('deep' => true))) {
                $this->Flash->set('新しいタグを追加しました：'.$this->request->data['Tag']['tag'], array(
                    'element' => 'success'));
                return $this->redirect(array('controller' => 'Categories', 'action' => 'index'));
            }
            $this->Flash->set('入力欄を確認してください', array(
                'element' => 'error'));
        }
    }

    public function edit($id = null) {
        // タグに対応するカテゴリーを編集
        $this->set('categories', $this->Category->find('list', array(
            'fields' => 'id, category',
        )));

        // $ifがない場合
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        // $categoryがない場合
        $tag = $this->Tag->findById($id);
        $this->set('id', $tag['Tag']['id']);

        if (!$tag) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->Tag->id = $id;
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Tag->saveAssociated($this->request->data, array('deep' => true))) {
                $this->Flash->set($this->request->data['Tag']['tag'].'：タグ内容が更新されました', array(
                    'element' => 'success'));
                return $this->redirect(array('controller' => 'Categories', 'action' => 'index'));
            }
            $this->Flash->set('更新内容を確認してください', array(
                'element' => 'error'));
        }

        // 内容を更新しない
        if (!$this->request->data) {
            $this->request->data = $tag;
        }
    }

    public function delete($id) {
        // カテゴリーを削除
        // タグは削除されない
        // タグ削除機能はまた別で作る！

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Tag->id = $id;
        if ($this->Tag->delete($id)) {
            // $this->request->data['Tag']['tag'] viewににこれが表示されない
            $this->Flash->set($this->request->data('Tag.tag').'：タグを削除しました', array(
                'element' => 'success'));

                $category_tag = 'UPDATE categories_tags SET deleted = 1, deleted_date = NOW() WHERE tag_id = ' . $id;
                $this->Tag->query($category_tag);
                $this->autoRender = false;
        } else {
            $this->Flash->set('削除できませんでした', array(
                'element' => 'error'));
        }
        return $this->redirect(array('controller' => 'Categories', 'action' => 'index'));
    }
}