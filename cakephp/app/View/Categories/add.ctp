<div class="mt-4">
    <h4 class="title">new Category</h4>
    <?php
    echo $this->Form->create('Category', array(
        'type' => 'text',
    ));
    echo $this->Form->input('category', array(
        'div' => array(
            'class' => 'form-group'),
         'class' => 'form-control',
         'error' => array(
            'attributes' => array(
                'wrap'=>'div',
                'class'=>'mt-2 p-1 alert alert-danger')),
    ));
    echo $this->Form->input('Tag', array(
        'type' => 'select',
        'multiple'=> 'checkbox',
        'error' => array(
            'attributes' => array(
                'wrap'=>'div',
                'class'=>'mt-2 p-1 alert alert-danger')),
    )); ?>
    
    <hr>
    <?php echo $this->Form->submit('Save Post', array(
        'div' => array(
            'class' => 'text-right'),
        'class' => 'btn btn-secondary mb-0',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>
