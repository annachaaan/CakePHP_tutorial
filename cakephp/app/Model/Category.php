<?php
class Category extends AppModel {
    public $actsAs = array('SoftDelete');

    public $validate = array(
        'category' => array(
            'rule1' => array(
                'rule' =>'notBlank',
                'message' => 'A Category is required.'
            ),
            'rule2' => array(
                'rule' =>'isUnique',
                'message' => 'Already used this Category.'
            ),
        )
    );


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
            'dependent' =>true,
            'conditions' => array(
                'CategoriesTag.tag_id = Tag.id',
                'Tag.deleted_date' => ""
            )
        ),
    );

}
