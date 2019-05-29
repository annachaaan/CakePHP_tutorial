<?php
class Tag extends AppModel {
    // public $actsAs = array('SoftDelete');

    public $validate = array(
        'tag' => array(
            'rule1' => array(
                'rule' =>'notBlank',
                'message' => 'A Tag is required.'
            ),
            'rule2' => array(
                'rule' =>'isUnique',
                'message' => 'Already used this Tag.'
            ),
        )
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent' => true
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
        ),
    );
}
