<div class="mt-4"">
    <h4 class=" title">
    <?php echo __('Edit Category') ?>
    </h4>
    <?php echo $this->Form->create('Category', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <label><?php echo __('Category'); ?></label>
        <?php
        echo $this->Form->input('category', array(
            'div' => array(
                'class' => 'form-group'
            ),
            'label' => false,
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap' => 'div',
                    'class' => 'mt-2 p-1 alert alert-danger'
                )
            ),
        )); ?>

        <label><?php echo __('Tag'); ?></label>
        <?php
        foreach ($category['Tag'] as $key => $tag) {
            echo $this->Form->input('Tag.' . $key . '.tag', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'label' => false,
                'class' => 'form-control',
                'error' => array(
                    'attributes' => array(
                        'wrap' => 'div',
                        'class' => 'mt-2 p-1 alert alert-danger'
                    )
                ),
            ));
            ?>
            <label><?php echo __('Check to delete Tag'); ?></label>
            <?php
            echo $this->Form->checkbox('Tag.' . $key . '.deleted');
            echo $this->Form->input('Tag.' . $key . '.id', array('type' => 'hidden'));
            echo $this->Form->input('Tag.' . $key . '.category_id', array('type' => 'hidden'));
        }
        ?>
        <div class="tag-form">
            <label><?php echo __('New Tag'); ?></label>
            <?php
            echo $this->Form->input('Tag..tag', array(
                'div' => array(
                    'class' => 'form-group'
                ),
                'label' => false,
                'class' => 'form-control',
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
    </fieldset>
    <hr>
    <?php
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->submit(__('Edit'), array(
        'div' => array(
            'class' => 'text-right'
        ),
        'class' => 'btn btn-info mb-0',
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