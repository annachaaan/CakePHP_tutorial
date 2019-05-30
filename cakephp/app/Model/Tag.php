<?php
class Tag extends AppModel {
    public $actsAs = array(
        'SoftDelete',
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent' => true,
            'conditions' => array(
                'Category.deleted' => 0
            )
        )
    );

    public $hasAndBelongsToMany = array(
        'Post' => array(
            'className' => 'Post',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'tag_id',
            'associationForeignKey' => 'post_id',
            'unique' => true,
            'dependent' =>true,
            'conditions' => array(
                'Post.deleted' => 0
            )
        ),
    );
}
