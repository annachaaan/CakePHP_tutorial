<?php
class Post extends AppModel {
    public $actsAs = array(
        'SoftDelete',
        'Search.Searchable'
    );

    // 検索条件を設定
    public $filterArgs = array(
        'category_id' => array('type' => 'value'),
        'tag_id' => array(
            'type' => 'value',
            'field'  => 'Tag.id',
        ),
        'title' => array('type' => 'like')
    );

    public $validate = array(
        'title' => array(
            // 'rule' =>'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );

    public $hasMany = array(
        'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'post_id',
        ),
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent'    => true
        )
    );

    public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'post_id',
            'associationForeignKey' => 'tag_id',
            'unique' => true,
            'dependent'    => true
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
