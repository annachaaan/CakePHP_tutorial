<div class="mt-4"">
    <h4 class="title">Edit Category</h4>
    <?php echo $this->Form->create('Category', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <?php
        echo $this->Form->input('category', array(
            'div' => array(
                'class' => 'form-group'),
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
            )); ?>
        <?php
        echo $this->Form->input('Tag.0.tag', array(
            'div' => array(
                'class' => 'form-group'),
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
        )); 
        echo $this->Form->input('Tag.0.id', array('type' => 'hidden'));
        ?>   
    </fieldset>
    <hr>
    <?php 
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->submit('Edit', array(
        'div' => array(
            'class' => 'text-right'),
            'class' => 'btn btn-info mb-0',
        )); ?>
    <?php echo $this->Form->end(); ?>
</div>
