<?php
class Tag extends AppModel {
    public $hasAndBelongsToMany = array(
        'Post' => array(
            'className' => 'Post',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'tag_id',
            'associationForeignKey' => 'post_id',
            'unique' => true,
            'dependent' =>true
        )
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent' => true
        )
    );
}
