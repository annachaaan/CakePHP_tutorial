<div class="mt-4">
    <h4 class="title">
        <?php echo __("New Category"); ?>
    </h4>
    <?php
    echo $this->Form->create(('Category'), array(
        'type' => 'text',
    ));
    echo $this->Form->input('Category.category', array(
        'div' => array(
            'class' => 'form-group'
        ),
        'class' => 'form-control',
        'label' => __('Category'),
        'error' => array(
            'attributes' => array(
                'wrap' => 'div',
                'class' => 'mt-2 p-1 alert alert-danger'
            )
        ),
    )); ?>
    <div class="tag-form">
        <?php
        echo $this->Form->input('Tag..tag', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'form-control',
            'label' => __('Tag'),
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        ));
        ?>
    </div>
    <input type="button" value="<?php echo __('Add more Tags'); ?>" id="tag-btn">
    <hr>
    <?php echo $this->Form->submit(__('Save Category'), array(
        'div' => array(
            'class' => 'text-right'
        ),
        'class' => 'btn btn-secondary mb-0',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>
<script>
    $(function() {
        var tagform = '<div class="form-group"><input name="data[Tag][][tag]" class="form-control" maxlength="255" type="text" id="TagTag"></div>'
        $('#tag-btn').on('click', function() {
            $('.tag-form').append(tagform);
        });
    });
</script>