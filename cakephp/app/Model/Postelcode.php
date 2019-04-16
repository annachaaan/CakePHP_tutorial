<?php
class Postelcode extends AppModel {
    public $validate = array(
        'csvfile' => array(
            'name' => array(
                'rule' => array(
                    'extension', array(
                        'csv', 'CSV'
                    )
                ),
                'message' => 'のんのんのん'
            )
        ),
    );
}
