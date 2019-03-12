<div class="alert alert-info mt-4" role="alert">
    <h4 class="alert-heading">Add Post</h4>
    <?php
    echo $this->Form->create('Post', array(
        'type' => 'file',
        'enctype' => 'multipart/form-data'
    ));
    echo $this->Form->input('category_id', array(
        'div' => array(
            'class' => 'form-group'),
         'class' => 'form-control'
    ));
    echo $this->Form->input('Tag', array(
        'type' => 'select',
        'multiple'=> 'checkbox',
    ));
    echo $this->Form->input('title', array(
        'div' => array(
            'class' => 'form-group'),
        'class' => 'form-control'
    ));
    echo $this->Form->input('body', array(
        'rows' => '3',
        'div' => array(
            'class' => 'form-group'),
        'class' => 'form-control'
    ));
    for ($i = 0; $i < 3; $i++) {
        echo $this->Form->input('Attachment..file_name', array(
            'type' => 'file',
            'label' => false,
            'multiple' => 'multiple',
            'class' => 'form-control-file'
        ));
    } ?>
    <hr>
    <?php echo $this->Form->submit('Save Post', array(
        'div' => array(
            'class' => 'text-right'),
        'class' => 'btn btn-info mb-0',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>
