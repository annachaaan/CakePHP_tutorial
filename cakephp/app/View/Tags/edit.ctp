<div class="mt-4"">
    <h4 class="title">Edit Tag</h4>
    <?php echo $this->Form->create('Tag', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <?php
        echo $this->Form->input('tag', array(
            'div' => array(
                'class' => 'form-group'),
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
            )); ?>
        <?php
        echo $this->Form->input('Category', array(
            'type' => 'select',
            'multiple'=> 'checkbox',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
        )); ?>   
    </fieldset>
    <hr>
    <?php 
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->submit('Edit', array(
        'div' => array(
            'class' => 'text-right'),
            'class' => 'btn btn-info mb-0',
        )); ?>
    <?php echo $this->Form->end(); 
    
    echo $this->Form->postLink(
        'Delete',
        array(
            'action' => 'delete',
            $id
        ),
        array(
            'class' => 'btn btn-sm btn-danger'
        ),
        'Are you sure?'
    );?>
</div>

