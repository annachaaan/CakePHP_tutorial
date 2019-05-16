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
        <?php echo $this->Paginator->numbers(); ?>
    </div>
</div>