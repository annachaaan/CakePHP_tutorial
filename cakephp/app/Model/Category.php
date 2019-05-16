<?php
class Category extends AppModel {
    public $hasMany = array(
        'Posts' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
        ),
    );

    public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'categories_tags',
            'foreignKey' => 'category_id',
            'associationForeignKey' => 'tag_id',
            'unique' => true,
            'dependent' =>true
        ),
    );

}
