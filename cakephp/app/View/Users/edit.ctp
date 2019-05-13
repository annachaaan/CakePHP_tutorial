<div class="mt-4"">
    <h4 class="title">Edit User</h4>
    <?php echo $this->Form->create('User', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <?php
        echo $this->Form->input('username', array(
            'div' => array(
                'class' => 'form-group'),
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
            )); ?>
        <span class="p-country-name" style="display:none;">Japan</span>
        <?php
        echo $this->Form->input('zipcode', array(
            'class' => 'p-postal-code form-control',
            'label' => '〒',
            'div' => array(
                'class' => 'form-group'),
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
        ));
        echo $this->Form->input('adress_auto', array(
            'class' => 'p-region p-locality form-control',
            'readonly',
            'div' => array(
                'class' => 'form-group'),
            'label' => 'Adress(auto)',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
        ));
        echo $this->Form->input('adress_manual', array(
            'class' => 'p-street-address p-extended-address form-control',
            'div' => array(
                'class' => 'form-group'),
            'label' => 'Adress',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
        ));
         ?>    </fieldset>
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
