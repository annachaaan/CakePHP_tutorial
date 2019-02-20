<?php echo $this->element('Admin/header'); ?>
<h1><?php echo h($post['Post']['title']); ?></h1>

<p>Tags:
    <?php if ($post['Tag']): ?>
        <?php foreach ($post['Tag'] as $tag): ?>
            <?php echo $tag['tagSlug']; ?>
        <?php endforeach; ?>
    <?php else: ?>
        noTags.
    <?php endif; ?>
</p>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<p>Photos:</br>
    <?php if ($post['Attachment']): ?>
    <?php foreach ($post['Attachment'] as $img): ?>
        <?php echo $this->Html->image(
            DS . 'img' . DS . 'file_name' . DS . $img['dir'] . DS . $img['file_name'],
            array('width'=>'200','height'=>'200')
        ); ?>
    <?php endforeach; ?>
    <?php else: ?>
        waiting for
    <?php endif; ?>
</p>
