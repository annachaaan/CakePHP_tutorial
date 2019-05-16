<?php
class Category extends AppModel {
    public $hasMany = array(
        'Posts' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
        ),
        'Tags' => array(
            'className' => 'Tag',
            'foreignKey' => 'category_id',
        ),
    );
}
