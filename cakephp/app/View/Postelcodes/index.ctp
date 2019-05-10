<div class="container mt-2">
    <p>CSVファイルをインポートできます</p>
<?php
    echo $this->Form->create('Postelcodes', array(
        'type' => 'file',
        'enctype' => 'multipart/form-data'
    ));
    echo $this->Form->input('csvfile', array('type' => 'file', 'label' => false));
    echo $this->Form->Submit('インポート');
    echo $this->Form->end();
 ?>
</div>
