<?php
class Attachment extends AppModel{
    public $actsAs = array(
        'SoftDelete',
        'Upload.Upload' => array(
            'file_name' => array(
                'thumbnailSizes' => array(
                    // 'thumb150' => '150x150',
                    // 'thumb80' => '80x80',
                ),
                'thumbnailMethod' => 'imagick',
                'fields' => array(
                    'dir' => 'dir', 'type' => 'type', 'size' => 'size',
                ),
                'mimetypes' => array(
                    'image/jpeg', 'image/gif', 'image/png'
                ),
                'extensions' => array(
                    'jpg', 'jpeg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'
                ),
                'maxSize' => 2097152, //2MB
            ),
        ),
    );

    public $belongsTo = array(
        'Post' => array(
            'className' =>'Post',
            'foreignKey' => 'post_id',
            'dependent'    => true
        ),
    );
}
