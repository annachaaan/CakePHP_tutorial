<div class="center-block">
    <div class="secondary row">
        <p class="mt-2"><?php echo $this->Paginator->counter(array('format' => __('total: {:count}')));?></p>
        <table class="table table-striped table-bordered">
            <tr class="table-secondary text-center">
                <th class="align-middle"><?php echo $this->Paginator->sort('id', 'ID', array('class' => 'text-secondary'));?></th>
                <th class="align-middle"><?php echo $this->Paginator->sort('title', 'Title', array('class' => 'text-secondary'));?></th>
                <th class="align-middle"><?php echo $this->Paginator->sort('category_id', 'Category', array('class' => 'text-secondary'));?></th>
                <th class="align-middle"><?php echo $this->Paginator->sort('Tag', 'Tag', array('class' => 'text-secondary'));?></th>
                <th class="align-middle"><?php echo $this->Paginator->sort('created', 'Created', array('class' => 'text-secondary'));?></th>
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
                            'class' => 'text-secondary'
                            )); ?>
                    </td>
                    <td class="align-middle"><?php echo $post['Category']['category']; ?></td>
                    <td class="align-middle">
                        <?php foreach ($post['Tag'] as $tag_key => $tag): ?>
                            <?php echo $tag['tagSlug']; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="align-middle"><?php echo $post['Post']['created']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
            <div class="paginator">
                <?php
                echo $this->Paginator->prev(
                    '« Previous',//表示される文字列
                    null,//リンクタグに加えるオプション（配列指定）
                    null,//リンク無効時の文字列（デフォルト値：null）
                    array('class' => 'disabled')//リンク無効時にタグに加えるオプションの指定
                );
                ?>
                <?php
                echo $this->Paginator->next(
                    'Next »',
                    null,
                    null,
                    array('class' => 'disabled')
                );
                ?>
        </div>
    </div>
    <div class="btn-wrapper">
        <div class="bnrL">
            <ul>
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
                    'class' => 'btn btn-secondary mb-0',
                    'name' => 'search'
                )); ?>
                <?php echo $this->Form->end(); ?>
            </ul>
            <button class="btn" type="button" name="button">search</button>
        </div>
    </div>
</div>
