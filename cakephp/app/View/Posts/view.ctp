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
