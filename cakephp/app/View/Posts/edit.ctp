<!-- jqueryの読み込み -->
<?php echo $this->Html->script('jquery-3.3.1.min.js', array('inline' => false)); ?>
<?php echo $this->Html->script('editPost.js'); ?>

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post', array(
    'type' => 'file',
    'enctype' => 'multipart/form-data'
));
echo $this->Form->input('category_id');
echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple'=> 'checkbox',
));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
?>
<table>
    <?php for ($i = 0; $i < 3; $i++) { ?>
        <?php if (isset($attachment_list[$i])): ?>
            <tr>
                <td>
                    <?php
                    echo $this->Html->image(
                        DS . 'img' . DS . 'file_name' . DS . $attachment_list[$i]['Attachment']['dir'] . DS . $attachment_list[$i]['Attachment']['file_name'],
                        array('width'=>'100','height'=>'80')
                    );
                    ?>
                    <label>↓削除するにはチェックしてください</label>
                    <?php
                    echo $this->Form->checkbox('Attachment.' . $attachment_list[$i]['Attachment']['index_num'] . '.deleted', array(
                        'label' => '削除',
                        'hiddenField' => false
                    ));
                    echo $this->Form->hidden('Attachment.' . $attachment_list[$i]['Attachment']['index_num'] . '.id', array(
                        'value' => $attachment_list[$i]['Attachment']['id']
                    ));
                    ?>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td>
                    <?php
                    echo $this->Form->input('Attachment..file_name', array(
                        'type' => 'file',
                        'label' => 'Image',
                        'multiple' => 'multiple',
                    ));
                     ?>
                </td>
            </tr>
        <?php endif; ?>
    <?php } ?>
</table>
<?php
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
