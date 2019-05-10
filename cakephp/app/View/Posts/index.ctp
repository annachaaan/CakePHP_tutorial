<div class="index">
    <?php foreach ($posts as $key => $post) : ?>
        <section>
            <div class="post-date">
                <!-- dateとstrtotimeでcreatedの時間表示を削除 -->
                <?php echo date('Y-m-d', strtotime($post['Post']['created'])); ?>
            </div>
            <div class="post-title">
                <?php echo $this->Html->link(
                    $post['Post']['title'],
                    array(
                        'action' => 'view',
                        $post['Post']['id']
                    )
                ); ?>
            </div>
            <div class="post-category">
                <?php echo $post['Category']['category']; ?>
            </div>
            <div class="post-tag">
                <?php foreach ($post['Tag'] as $tag_key => $tag) : ?>
                    <?php echo $tag['tagSlug']; ?>
                <?php endforeach; ?>
            </div>
        </section>
        <hr>
    <?php endforeach; ?>

    <div class="paginator">
        <?php
        echo $this->Paginator->prev(
            '« Previous', //表示される文字列
            null, //リンクタグに加えるオプション（配列指定）
            null, //リンク無効時の文字列（デフォルト値：null）
            array('class' => 'disabled') //リンク無効時にタグに加えるオプションの指定
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

    <!-- 検索機能 -->
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
                        'class' => 'form-group'
                    ),
                    'class' => 'form-control'
                )); ?>
                <hr>
                <?php echo $this->Form->submit('Search', array(
                    'div' => array(
                        'class' => 'text-right'
                    ),
                    'class' => 'btn btn-secondary mb-0',
                    'name' => 'search'
                )); ?>
                <?php echo $this->Form->end(); ?>
            </ul>
            <button class="btn" type="button" name="button">search</button>
        </div>
    </div>
</div>