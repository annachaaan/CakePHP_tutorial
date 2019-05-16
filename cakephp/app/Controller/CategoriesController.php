<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {
    public $layout = "main";

    public function index() {
        debug($this->Category->find());
    }

    public function add() {
        // 新規カテゴリー作成
        // 対応するタグを選択
        // 新規タグを作成することも可能
    }

    public function edit() {
        // カテゴリーに対応するタグを編集
    }

    public function delete() {
        // カテゴリーを削除
        // たひは削除されない
        // タグ削除機能はまた別で作る！
    }

}