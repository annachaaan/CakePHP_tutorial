<?php
class Postelcode extends AppModel {
    public $actsAs = array(
	    'CsvImport' => array(
            'delimiter'  => ',',
        ),
    );

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
