<div class="post-area">
    <div class="title">
        <p class="d-flex flex-row-reverse mb-0"><small><?php echo $post['Post']['created']; ?></small></p>
    </div>
    <div class="text">
        <h3 class="post-title"><?php echo ($post['Post']['title']); ?></h3>
        <div class="btn-form d-flex flex-row-reverse">
            <?php
            if ($user['id'] == $post['Post']['user_id']) {
                echo $this->element('btn', ['id' => $post['Post']['id']]);
            } ?>
        </div>
        <p class="post-category"><?php echo $post['Category']['category']; ?></p>
        <p class="post-tag"><?php if ($post['Tag']) : ?>
                <?php foreach ($post['Tag'] as $tag) : ?>
                    <?php echo $tag['tagSlug']; ?>
                <?php endforeach; ?>
            <?php endif; ?></p>
        <hr>
        <p class="post-body"><?php echo (nl2br(h($post['Post']['body']))); ?></p>
        <hr>
        <?php if ($attachment_list) : ?>
            <p>Photos</p>
            <div class="d-flex">
                <?php foreach ($attachment_list as $key => $img) : ?>
                    <p class="p-2">
                        <a href="<?php echo DS . 'img' . DS . 'file_name' . DS . $img['Attachment']['dir'] . DS . $img['Attachment']['file_name']; ?>" data-lightbox="group">
                            <?php echo $this->Html->image(
                                DS . 'img' . DS . 'file_name' . DS . $img['Attachment']['dir'] . DS . $img['Attachment']['file_name'],
                                array(
                                    'width' => '200', 'height' => '200',
                                    'class' => 'img-thumbnail',
                                )
                            ); ?>
                        </a>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>