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
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            $this->User->validate['email'] = array(
                'rule2' => array(
                    'rule' => 'notBlank',
                    'message' => 'A email is required'
                ),
            );

            if ($this->User->validates(array('fieldList' => array('password', 'email')))) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }
            }
        }
    }

    public function logout()
    {
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
                return $this->redirect('/');
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
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
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect('/users/view/' . $this->request->data['User']['id']);
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
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
            $this->Flash->success(__('User deleted'));
            return $this->redirect($this->Auth->logout());
        }
        $this->Flash->error(__('User was not deleted'));
        // return $this->redirect(array('action' => 'index'));
    }
}
