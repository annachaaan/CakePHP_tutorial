<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Add post',
    array('controller' => 'posts', 'action' => 'add')
); ?><br>
<?php echo $this->Html->link(
    'Search',
    array('controller' => 'posts', 'action' => 'find')
); ?>
<table>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
    <?php $i = 1; ?>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <?php echo $i; ?>
            <?php $i ++; ?>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Category']['category']; ?></td>
        <td>
            <?php foreach ($post['Tag'] as $tag): ?>
                <?php echo $tag['tagSlug']; ?>
            <?php endforeach; ?>
        </td>
        <td>
            <?php
                // postLink() を使うと、
                // 投稿記事の削除を行う POST リクエストをするための JavaScript を使うリンクが生成される
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

<?php print_r($posts[0]); ?>
