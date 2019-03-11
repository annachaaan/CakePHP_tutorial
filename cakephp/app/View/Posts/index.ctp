<table class="table table-striped table-bordered mt-5">
    <tr class="table-info text-center">
        <th class="align-middle">No</th>
        <th class="align-middle">Title</th>
        <th class="align-middle">Category</th>
        <th class="align-middle">Tags</th>
        <th class="align-middle">Action</th>
        <th class="align-middle">Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
    <?php $i = 1; ?>
    <?php foreach ($posts as $post): ?>
    <tr class="text-center">
        <td class="align-middle">
            <?php echo $i; ?>
            <?php $i ++; ?>
        </td>
        <td class="align-middle">
            <?php
            echo $this->Html->link($post['Post']['title'],
                array(
                    'controller' => 'posts',
                    'action' => 'view',
                    $post['Post']['id']),
                array(
                    'class' => 'navbar-brand text-info',
            )); ?>
        </td>
        <td class="align-middle"><?php echo $post['Category']['category']; ?></td>
        <td class="align-middle">
            <?php foreach ($post['Tag'] as $tag): ?>
                <?php echo $tag['tagSlug']; ?>
            <?php endforeach; ?>
        </td>
        <td class="align-middle">
            <?php
                echo $this->Html->link(
                    'Edit',
                    array(
                        'action' => 'edit',
                        $post['Post']['id']),
                    array(
                        'class' => 'btn btn-sm btn-outline-info'
                )); ?>
            <?php
                // postLink() を使うと、
                // 投稿記事の削除を行う POST リクエストをするための JavaScript を使うリンクが生成される
                echo $this->Form->postLink(
                    'Delete',
                    array(
                        'action' => 'delete',
                        $post['Post']['id']),
                    array(
                        'class' => 'btn btn-sm btn-outline-danger'),
                    'Are you sure?'
                ); ?>
        </td>
        <td class="align-middle"><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
