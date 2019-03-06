<h1>Add Post</h1>
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
for ($i = 0; $i < 3; $i++) {
    echo $this->Form->input('Attachment.' . $i . '.file_name', array(
        'type' => 'file',
        'label' => 'Image',
        'multiple' => 'multiple',
    ));
}
echo $this->Form->end('Save Post');

?>
