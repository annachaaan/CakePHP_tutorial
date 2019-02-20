<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array(
    'type' => 'file',
    'enctype' => 'multipart/form-data'
));
echo $this->Form->input('category_id');
echo $this->Form->input('Tag', array(
    'type' => 'select',
    // multipleだとdiv解除できない...
    'multiple'=> 'checkbox',
));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
// echo $this->Form->input('Attachment.0.index_num', array('type' => 'hidden'));
echo $this->Form->input('Attachment.0.file_name', array(
    'type' => 'file',
    'label' => 'Image',
    'enctype' => 'multipart/form-data',
));
// echo $this->Form->input('Attachment.1.index_num', array('type' => 'hidden'));
echo $this->Form->input('Attachment.1.file_name', array(
    'type' => 'file',
    'label' => 'Image',
    'multiple' => 'multiple',
));
echo $this->Form->end('Save Post');

?>
