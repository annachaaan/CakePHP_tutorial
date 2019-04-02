<?php
class Postelcode extends AppModel {
    public $actsAs = array(
	    'CsvImport' => array(
            'delimiter'  => ',',
        ),
    );
}
