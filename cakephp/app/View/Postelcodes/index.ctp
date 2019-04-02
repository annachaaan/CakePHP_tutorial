<?php
    echo $this->Form->create('Postelcodes', array(
        'type' => 'file',
        'enctype' => 'multipart/form-data'
    ));
    echo $this->Form->input('csvfile', array('type' => 'file', 'label' => 'CSVファイル'));
    echo $this->Form->Submit('CSVファイル読み込み');
    echo $this->Form->end();
 ?>
