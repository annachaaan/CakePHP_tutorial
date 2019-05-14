<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{

    public function beforeFilter()
    {
        $this->layout = 'main';
        // ↓ AppControllerのBeforeFilterを有効にする呪文
        parent::beforeFilter();
        // ユーザー自身によるaddとlogoutアクションを有効にしておく
        $this->Auth->allow('add', 'logout');
    }

    public function isAuthorized($user)
    {
        // Check that the $user is equal to the current user.
        $id = $this->request->params['pass'][0];
        if ($id == $user['id']) {
            return true;
        }
        return false;
    }

    public function login()
    {
        // ログインしているユーザーは前のページに飛ばされる
        $user = $this->Auth->user();
        if (isset($user)) {
            return $this->redirect($this->referer(null, true));
        }

        if ($this->request->is('post')) {

            // バリデーションをコントローラから呼び出し
            // rule2はユニークなemailからnotBlankに変更
            $this->User->set($this->request->data);
            $this->User->validate['email'] = array(
                'rule2' => array(
                    'rule' => 'notBlank',
                    'message' => 'A email is required'
                ),
            );
            if ($this->User->validates(array('fieldList' => array('password', 'email')))) {
                if ($this->Auth->login()) {
                    $this->Flash->set('こんにちは, '.$this->Auth->user('username').'さん', array(
                        'element' => 'success'));
                    $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->set('The user has been faild.', array(
                        'element' => 'error'));
                }
            } 
        }
    }

    public function logout()
    {
        $this->Flash->set('ログアウトされました', array(
            'element' => 'success'));
        $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null)
    {
        $this->User->id = $id;
        // 作ったidがすでに存在位していないか確認 exists()
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
        $this->set('auth', $this->Auth->user('id'));
    }

    public function add()
    {
        // ログインしているユーザーは前のページに飛ばされる
        $user = $this->Auth->user();
        if (isset($user)) {
            return $this->redirect($this->referer(null, true));
        }

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $id = $this->User->id;
                $this->request->data['User'] = array_merge(
                    $this->request->data['User'],
                    array(
                        'id' => $id
                    )
                );
                unset($this->request->data['User']['password']);
                $this->Auth->login($this->request->data['User']);
                $this->Flash->set('こんにちは, '.$this->Auth->user('username').'さん', array(
                    'element' => 'success'));
                return $this->redirect('/');
            }
            $this->Flash->set('登録できませんでした', array(
                'element' => 'error'));
        }
    }

    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $this->set('user', $user);
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->set('ユーザー情報が更新されました', array(
                    'element' => 'success'));
                return $this->redirect('/users/view/' . $this->request->data['User']['id']);
            }
            $this->Flash->set('入力内容を確認してください', array(
                'element' => 'error'));
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id, $cascade = true)
    {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete($id)) {
            $this->Flash->set('退会しました', array(
                'element' => 'success'));
            return $this->redirect($this->Auth->logout());
        }
        $this->Flash->set('退会できませんでした', array(
            'element' => 'error'));
    }
}
