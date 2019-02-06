<?php
class CategoriesController extends AppController {
    // public function index() {
    //     $query->$this->find('all')->contain(['Posts']);
    //     $this->set('categories', $query);
    // }
    public function index() {
        $this->set('Category', $this->Category->find('all'));
    }
}
