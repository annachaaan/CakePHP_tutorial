<div class="mt-2">
    <p>CSVファイルをインポートできます</p>
    <?php
    echo $this->Form->create('Postelcodes', array(
        'type' => 'file',
        'enctype' => 'multipart/form-data'
    ));
    echo $this->Form->input('csvfile', array('type' => 'file', 'label' => false));
    echo $this->Form->Submit('Import', array(
        'class' => 'btn btn-outline-secondary p-1'
    ));
    echo $this->Form->end();
    ?>
</div>