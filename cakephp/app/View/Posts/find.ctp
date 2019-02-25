<h1><?php echo $this->Html->link('BlogTop', array('action' => 'index')); ?></h1>
<?php echo $this->Form->create('Post'); ?>
<p>検索</p>
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
    'empty' => true,
)); ?>
<?php echo $this->Form->end('検索'); ?>
<p><?php echo $this->Paginator->counter(array('format' => __('total: {:count}')));?></p>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('title', 'タイトル');?></th>
        <th><?php echo $this->Paginator->sort('category_id', 'カテゴリー');?></th>
        <th><?php echo $this->Paginator->sort('Tag', 'タグ');?></th>
        <th><?php echo $this->Paginator->sort('created', '作成日時');?></th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo h($post['Post']['id']); ?></td>
            <td><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></td>
            <td><?php echo $post['Category']['category']; ?></td>
            <td>
                <?php foreach ($post['Tag'] as $tag): ?>
                    <?php echo $tag['tagSlug']; ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo h($post['Post']['created']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- <?php print_r($posts[0]); ?> -->
