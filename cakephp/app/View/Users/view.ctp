<div class="m-4">
    <div class="text-secondary">
        <div class="alert alert-secondary" role="alert">
            <h3 class="alert-heading mt-2 mb-2"><?php echo ($user['User']['username']); ?></h3>
            <?php if ($user['User']['id'] == $auth): ?>
                <?php
                    echo $this->Html->link(
                        'Edit',
                        array(
                            'action' => 'edit',
                            $user['User']['id']
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
                            $user['User']['id']
                        ),
                        array(
                            'class' => 'btn btn-sm btn-outline-danger'
                        ),
                        'Are you sure?'
                    ); ?>
            <?php endif; ?>
            <p>住所</p>
            <p><?php echo '〒'.$user['User']['zipcode']; ?></p>
            <p><?php echo $user['User']['adress_auto'] . $user['User']['adress_manual']; ?></p>
        </div>
    </div>
</div>
