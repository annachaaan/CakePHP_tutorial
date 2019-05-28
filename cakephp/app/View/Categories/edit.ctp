<div class="mt-4"">
    <h4 class="title">Edit Category</h4>
    <?php echo $this->Form->create('Category', array(
        'class' => 'h-adr',
        'novalidate' => true
    )); ?>
    <fieldset>
        <label>Category</label>
        <?php
        echo $this->Form->input('category', array(
            'div' => array(
                'class' => 'form-group'),
            'label' => false,
            'class' => 'form-control',
            'error' => array(
                'attributes' => array(
                    'wrap'=>'div',
                    'class'=>'mt-2 p-1 alert alert-danger')),
            )); ?> 

        <label>Tag</label>
        <?php
            foreach ($category['Tag'] as $key => $tag) {
                echo $this->Form->input('Tag.' . $key . '.tag', array(
                    'div' => array(
                        'class' => 'form-group'),
                    'label' => false,
                    'class' => 'form-control',
                    'error' => array(
                        'attributes' => array(
                            'wrap'=>'div',
                            'class'=>'mt-2 p-1 alert alert-danger')),
                )); 
        ?>
        <label>削除する場合はチェック⇨</label>
        <?php 
                echo $this->Form->checkbox('Tag.' . $key . '.deleted');
                echo $this->Form->input('Tag.' . $key . '.id', array('type' => 'hidden'));
                echo $this->Form->input('Tag.' . $key . '.category_id', array('type' => 'hidden'));
            }
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
