<div class="alert alert-info mt-4" role="alert">
    <h4 class="alert-heading">Search</h4>
    <?php echo $this->Form->create('Post'); ?>
    <?php echo $this->Form->input('category_id', array(
        'label' => 'カテゴリー',
        'empty' => true
    )); ?>
    <?php echo $this->Form->input('tag_id', array(
        'label' => 'タグ',
        'type' => 'select',
        'multiple' => 'checkbox',
        'options' => $tag_id
    )); ?>
    <?php echo $this->Form->input('title', array(
        'label' => 'タイトル',
        'type' => 'text',
        'required' => false,
        'div' => array(
            'class' => 'form-group'),
        'class' => 'form-control'
    )); ?>
    <hr>
    <?php echo $this->Form->submit('Search', array(
        'div' => array(
            'class' => 'text-right'),
        'class' => 'btn btn-info mb-0',
        'name' => 'search'
    )); ?>
    <?php echo $this->Form->end(); ?>
</div>
<p class="mt-4"><?php echo $this->Paginator->counter(array('format' => __('total: {:count}')));?></p>
<table class="table table-striped table-bordered mt-0">
    <tr class="table-info text-center">
        <th class="align-middle"><?php echo $this->Paginator->sort('id', 'ID', array('class' => 'text-info'));?></th>
        <th class="align-middle"><?php echo $this->Paginator->sort('title', 'Title', array('class' => 'text-info'));?></th>
        <th class="align-middle"><?php echo $this->Paginator->sort('category_id', 'Category', array('class' => 'text-info'));?></th>
        <th class="align-middle"><?php echo $this->Paginator->sort('Tag', 'Tag', array('class' => 'text-info'));?></th>
        <th class="align-middle text-info">Action</th>
        <th class="align-middle"><?php echo $this->Paginator->sort('created', 'Created', array('class' => 'text-info'));?></th>
    </tr>

    <?php foreach ($posts as $key => $post): ?>
        <tr class="text-center">
            <td class="align-middle"><?php echo $post['Post']['id']; ?></td>
            <td class="align-middle　text-secondary">
                <?php echo $this->Html->link($post['Post']['title'],
                    array(
                        'action' => 'view',
                        $post['Post']['id']
                    ),
                    array(
                    'class' => 'text-info'
                    )); ?>
            </td>
            <td class="align-middle"><?php echo $post['Category']['category']; ?></td>
            <td class="align-middle">
                <?php foreach ($post['Tag'] as $tag_key => $tag): ?>
                    <?php echo $tag['tagSlug']; ?>
                <?php endforeach; ?>
            </td>
            <td class="align-middle">
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
            </td>
            <td class="align-middle"><?php echo $post['Post']['created']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
