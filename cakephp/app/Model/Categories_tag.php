<?php
class CategoriesTag extends AppModel {
    public $actsAs = array('SoftDelete');

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent' =>true
        ),

        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id',
            'dependent' =>true
        )
    );
}