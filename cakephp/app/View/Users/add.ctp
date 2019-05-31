<div class="mt-4">
    <h4 class="title"><?php echo __('Sign up'); ?></h4>
    <?php echo $this->Form->create('User', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <?php
        echo $this->Form->input('username', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'label' => __('Username'),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
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
        <!-- <span class="p-country-name" style="display:none;">Japan</span> -->
        <?php
        echo $this->Form->input('zipcode', array(
            'class' => 'form-control',
            'div' => array(
                'class' => 'form-group'
            ),
            'id' => 'zipcode',
            'label' => __("〒Zipcode(Use number, only)"),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
        echo $this->Form->input('adress_auto', array(
            'class' => 'form-control',
            'id' => 'adress',
            'div' => array(
                'class' => 'form-group'
            ),
            'label' => __('Prefectures'),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
        echo $this->Form->input('adress_manual', array(
            'class' => 'form-control',
            'id' => 'others',
            'div' => array(
                'class' => 'form-group'
            ),
            'label' => __('Other'),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
        ?>
    </fieldset>
    <hr>
    <?php echo $this->Form->submit(__('Sign Up'), array(
        'div' => array(
            'class' => 'text-right'
        ),
        'class' => 'btn btn-secondary mb-0',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>