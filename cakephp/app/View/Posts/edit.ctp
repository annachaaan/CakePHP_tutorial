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
    <?php $i = 0; ?>
    <?php if($post['Attachment']): ?>
        <?php foreach($post['Attachment'] as $img): ?>
            <?php $i++; ?>
            <tr>
                <?php if($img['index_num'] != null): ?>
                    <td>
                        <?php
                        echo $this->Html->image(
                            DS . 'img' . DS . 'file_name' . DS . $img['dir'] . DS . $img['file_name'],
                            array('width'=>'100','height'=>'80')
                        );
                        ?>
                        <label>↓削除するにはチェックしてください</label>
                        <?php
                        echo $this->Form->checkbox('Attachment.' . $img['index_num'] . '.deleted', array(
                            'label' => '削除',
                            // 'value' => 1,
                            'hiddenField' => false
                        ));
                        $imgId = $img['id'];
                        echo $this->Form->hidden('Attachment.' . $img['index_num'] . '.id', array(
                            'value' => $img['id']
                        ));
                        ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php for ($i = $i; $i < 3; $i++) { ?>
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
    <?php } ?>
</table>
<?php
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>

<?php print_r($post['Attachment']); ?>
