<div class="mt-4">
    <h4 class="title"><?php echo __('Add Post'); ?></h4>
    <?php
    echo $this->Form->create('Post', array(
        'type' => 'file',
        'enctype' => 'multipart/form-data'
    ));
    echo $this->Form->input('category_id', array(
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control',
        'id' => 'categoryId',
        'label' => __('Category'),
        'empty' => __('Select category'),
        'required',
    ));
    echo $this->Form->input('Tag', array(
        'type' => 'select',
        'multiple' => 'checkbox',
        'div' => array(
            'id' => 'select'
        ),
        'label' => __('Tag')
    ));
    echo $this->Form->input('title', array(
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control',
        'label' => __('Title'),
        'error' => array(
            'attributes' => array(
                'wrap' => 'div',
                'class' => 'mt-2 p-1 alert alert-danger'
            )
        )
    ));
    echo $this->Form->input('body', array(
        'rows' => '3',
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control',
        'label' => __('Body'),
        'error' => array(
            'attributes' => array(
                'wrap' => 'div',
                'class' => 'mt-2 p-1 alert alert-danger'
            )
        )
    ));
    for ($i = 0; $i < 3; $i++) {
        echo $this->Form->input('Attachment..file_name', array(
            'type' => 'file',
            'label' => false,
            'multiple' => 'multiple',
            'class' => 'form-control-file',
        ));
    } ?>
    <hr>
    <?php echo $this->Form->submit(__('Save Post'), array(
        'div' => array(
            'class' => 'text-right'
        ),
        'class' => 'btn btn-secondary mb-0',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>