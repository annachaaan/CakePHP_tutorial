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
    <?php foreach ($attachment_list as $key => $list): ?>
        <tr>
            <td>
                <?php
                echo $this->Html->image(
                    DS . 'img' . DS . 'file_name' . DS . $list['Attachment']['dir'] . DS . $list['Attachment']['file_name'],
                    array('width'=>'100','height'=>'80')
                );
                ?>
                <label>↓削除するにはチェックしてください</label>
                <?php
                echo $this->Form->checkbox('Attachment.' . $list['Attachment']['index_num'] . '.deleted', array(
                    'label' => '削除',
                    'hiddenField' => false
                ));
                echo $this->Form->hidden('Attachment.' . $list['Attachment']['index_num'] . '.id', array(
                    'value' => $list['Attachment']['id']
                ));
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php $countImage = count($attachment_list); ?>
    <?php for ($i=$countImage++; $i < 3; $i++):?>
        <tr>
            <td>
                <?php
                echo $this->Form->input('Attachment.' . $i . '.file_name', array(
                    'type' => 'file',
                    'label' => 'Image',
                    'multiple' => 'multiple',
                ));
                 ?>
            </td>
        </tr>
    <?php endfor; ?>
</table>
<?php
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
