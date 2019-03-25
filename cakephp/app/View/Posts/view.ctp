<div class="m-4">
    <div class="title mb-4">
        <p class="d-flex flex-row-reverse mb-0"><small><?php echo $post['Post']['created']; ?></small></p>
    </div>
    <div class="text-secondary">
        <div class="alert alert-secondary" role="alert">
            <h3 class="alert-heading mt-2 mb-2"><?php echo ($post['Post']['title']); ?></h3>
            <?php if ($user['id'] == $post['Post']['user_id']): ?>
                <?php
                    echo $this->Html->link(
                        'Edit',
                        array(
                            'action' => 'edit',
                            $post['Post']['id']
                        ),
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
                            $post['Post']['id']
                        ),
                        array(
                            'class' => 'btn btn-sm btn-outline-danger'
                        ),
                        'Are you sure?'
                    ); ?>
            <?php endif; ?>
            <p><?php echo $post['Category']['category']; ?></p>
            <p><?php if ($post['Tag']): ?>
                <?php foreach ($post['Tag'] as $tag): ?>
                    <?php echo $tag['tagSlug']; ?>
                <?php endforeach; ?>
            <?php else: ?>
                noTags.
            <?php endif; ?></p>
            <hr>
            <p class="mt-4"><?php echo ($post['Post']['body']); ?></p>
            <hr>
            <p>Photos</p>
            <div class="d-flex p-2">
                <?php if ($attachment_list): ?>
                    <?php foreach ($attachment_list as $key => $img): ?>
                        <p class="p-2">
                            <a href="<?php echo DS . 'img' . DS . 'file_name' . DS . $img['Attachment']['dir'] . DS . $img['Attachment']['file_name']; ?>"
                                data-lightbox="group">
                                <?php echo $this->Html->image(
                                    DS . 'img' . DS . 'file_name' . DS . $img['Attachment']['dir'] . DS . $img['Attachment']['file_name'],
                                    array('width'=>'200','height'=>'200',
                                    'class' => 'img-thumbnail',
                                )); ?>
                            </a>
                        </p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
