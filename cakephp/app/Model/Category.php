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
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
        ),
        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'category_id'
        )
    );
}
