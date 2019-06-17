<!-- $id urlに渡すパラメータ -->

<?php
echo $this->Html->link(
    __('Edit'),
    array(
        'action' => 'edit',
        $id
    ),
    array(
        'class' => 'btn btn-sm btn-outline-info'
    )
);
// postLink() を使うと、
// 投稿記事の削除を行う POST リクエストをするための JavaScript を使うリンクが生成される
echo $this->Form->postLink(
    __('Delete'),
    array(
        'action' => 'delete',
        $id,
        'admin' => $boolean
    ),
    array(
        'class' => 'btn btn-sm btn-danger'
    ),
    __('Are you sure?')
);
