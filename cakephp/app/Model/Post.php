<?php
class Post extends AppModel {
    public $actsAs = array(
        'SoftDelete'
    );

    public $validate = array(
        'title' => array(
            'rule' =>'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
        )
    );

    public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'post_id',
            'associationForeignKey' => 'tag_id',
            'unique' => true,
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
