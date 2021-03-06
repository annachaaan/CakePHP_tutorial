<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $actsAs = array(
        'SoftDelete',
    );

    public $validate = array(
        'username' => array(
            'rule' => 'notBlank',
            'message' => 'A username is required'
        ),
        'password' => array(
            'rule' => 'notBlank',
            'message' => 'A password is required'
        ),
        'email' => array(
            'rule1' => array(
                'rule' => array('email', true),
                'message' => 'A email is required'
            ),
            'rule2' => array(
                'rule' => 'isUnique',
                'message' => 'Already used this email'
            ),
        ),
        'zipcode' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => 'A postalcode is required'
            ),
            'rule2' => array(
                'rule' => array('custom', '/^[0-9]{7}$/'),
                'message' => 'You can input [0000000]',
            )
        ),
        'adress_auto' => array(
            'rule' => 'notBlank',
            'message' => 'A postal code is required'
        ),
        'adress_manual' => array(
            'rule' => 'notBlank',
            'message' => 'A postal code is required'
        )
    );

    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => array(
                'Post.deleted' => 0
            ),
        ),
    );

    // ↓ beforeSave この関数に保存の前処理のロジックを置く
    // この関数はモデルのデータがバリデーションに成功した後、 データが保存される前に実行
    public function beforeSave($options = array()) {
        // パスワードのハッシュ化処理を行う
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
