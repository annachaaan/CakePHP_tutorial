<!-- jqueryの読み込み -->
<?php echo $this -> Html -> script( 'jquery-3.3.1.min', array( 'inline' => false ) ); ?>

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('category_id');
echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple'=> 'checkbox',
));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('Attachment.0.file_name', array(
    'type' => 'file',
    'label' => 'Image',
    'multiple' => 'multiple',
));
echo $this->Form->input('Attachment.1.file_name', array(
    'type' => 'file',
    'label' => 'Image',
    'multiple' => 'multiple',
));
echo $this->Form->input('Attachment.2.file_name', array(
    'type' => 'file',
    'label' => 'Image',
    'multiple' => 'multiple',
));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
