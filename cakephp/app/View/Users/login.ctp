<div class="mt-4">
    <h4 class="title"><?php __('Sign In'); ?></h4>
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->Form->create('User', array(
        'novalidate' => true
    )); ?>
    <legend>
        <?php echo __('Please enter your username and password'); ?>
    </legend>
    <fieldset>
        <?php
        echo $this->Form->input('password', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'label' => __('Password'),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
        echo $this->Form->input('email', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'label' => __('Email'),
            'type' => 'email',
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        )); ?>
    </fieldset>
    <hr>
    <?php echo $this->Form->submit(__('Sign In'), array(
        'div' => array(
            'class' => 'text-right'
        ),
        'class' => 'btn btn-secondary mb-0',
    )); ?>
</div>