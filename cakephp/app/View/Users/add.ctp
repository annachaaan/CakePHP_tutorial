<div class="alert alert-info mt-4" role="alert">
    <h4 class="alert-heading">Sign Up</h4>
    <?php echo $this->Form->create('User', array(
        'class' => 'h-adr'
    )); ?>
    <fieldset>
        <?php
        echo $this->Form->input('username', array(
            'div' => array(
                'class' => 'form-group'),
                'class' => 'form-control'
            ));
        echo $this->Form->input('password', array(
            'div' => array(
                'class' => 'form-group'),
                'class' => 'form-control'
            ));
        echo $this->Form->input('role', array(
            'div' => array(
                'class' => 'form-group'),
                'options' => array('admin' => 'Admin', 'author' => 'Author'),
                'class' => 'form-control'
            )); ?>
        <span class="p-country-name" style="display:none;">Japan</span>
        <?php
        echo $this->Form->input('postel_code', array(
            'class' => 'p-postal-code form-control',
            'size' => 8,
            'maxlength' => 8,
            'label' => '〒',
            'div' => array(
                'class' => 'form-group'),
        ));
        echo $this->Form->input('adress_auto', array(
            'class' => 'p-region p-locality form-control',
            'readonly',
            'div' => array(
                'class' => 'form-group'),
            'label' => 'Adress(auto)',
        ));
        echo $this->Form->input('adress_manual', array(
            'class' => 'p-street-address p-extended-address form-control',
            'div' => array(
                'class' => 'form-group'),
            'label' => 'Adress'
        ));
         ?>    </fieldset>
    <hr>
    <?php echo $this->Form->submit('Sign Up', array(
        'div' => array(
            'class' => 'text-right'),
            'class' => 'btn btn-info mb-0',
        )); ?>
    <?php echo $this->Form->end(); ?>
</div>
