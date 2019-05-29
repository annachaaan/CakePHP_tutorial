<?php
class PostsTag extends AppModel {
    public $actsAs = array(
        'SoftDelete',
        'Search.Searchable'
    );

    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
            'dependent' =>true,
        ),

        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id',
            'dependent' =>true,
        )
    );
}
