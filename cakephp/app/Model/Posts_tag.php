<?php
class PostsTag extends AppModel {
    public $belongsTo = array(
        'Post' = array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
            'dependent' =>true
        ),

        'Tag' = array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id',
            'dependent' =>true
        )
    );
}
