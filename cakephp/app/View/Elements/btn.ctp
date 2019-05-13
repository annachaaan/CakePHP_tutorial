<!-- $id urlに渡すパラメータ -->

<?php
echo $this->Html->link(
    'Edit',
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
    'Delete',
    array(
        'action' => 'delete',
        $id
    ),
    array(
        'class' => 'btn btn-sm btn-danger'
    ),
    'Are you sure?'
);
