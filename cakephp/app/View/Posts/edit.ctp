<div class="post-area">
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
        'required',
    ));
    echo $this->Form->input('Tag', array(
        'multiple' => 'checkbox',
    ));
    echo $this->Form->input('title', array(
        'div' => array(
            'class' => 'form-group'),
        'class' => 'form-control',
        'required' => false,
    ));
    echo $this->Form->input('body', array(
        'rows' => '3',
        'div' => array(
            'class' => 'form-group'),
        'class' => 'form-control',
        'required' => false,
        
    )); ?>
    <div>
        <?php foreach ($attachment_list as $key => $list): ?>
            <p>
                <?php
                echo $this->Html->image(
                    DS . 'img' . DS . 'file_name' . DS . $list['Attachment']['dir'] . DS . $list['Attachment']['file_name'],
                        array('width'=>'100','height'=>'80', 'class' => 'img-thumbnail'
                )); ?>
                <label>削除しちゃう？→</label>
                <?php
                echo $this->Form->checkbox('Attachment.' . $list['Attachment']['index_num'] . '.deleted', array(
                    'label' => '削除',
                    'hiddenField' => false
                ));
                echo $this->Form->hidden('Attachment.' . $list['Attachment']['index_num'] . '.id', array(
                    'value' => $list['Attachment']['id']
                )); ?>
            </p>
        <?php
        endforeach;
        $countImage = count($attachment_list);
        for ($i=$countImage++; $i < 3; $i++) { 
            echo $this->Form->input('Attachment.' . $i . '.file_name', array(
                'type' => 'file',
                'label' => false,
                'multiple' => 'multiple',
            ));
        } ?>
    </div>
    <hr>
    <?php
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->submit('Save Post', array(
        'div' => array(
            'class' => 'text-right'),
        'class' => 'btn btn-secondary',
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>
