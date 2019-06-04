<div class="m-4">
    <div class="profile">
        <h3 class="mt-2 mb-2"><?php echo (__('Username : ') . $pageuser['User']['username']); ?></h3>
        <div class="btn-form d-flex flex-row-reverse">
            <?php
            if ($pageuser['User']['id'] == $auth['id'] || $auth['role'] == 'admin') {
                echo $this->element('btn', ['id' => $pageuser['User']['id']]);
            } ?>
        </div>
        <?php echo __('Email : ') . $pageuser['User']['email']; ?>
        <br>
        <hr>
        <?php echo __('Adress : 〒') . $pageuser['User']['zipcode']; ?>
        <br>
        <?php echo $pageuser['User']['adress_auto'] . $pageuser['User']['adress_manual']; ?>
    </div>
    <div class="myposts">
        <ul><?php echo __('My Posts'); ?>
            <?php foreach ($pageuser['Post'] as $key => $post) : ?>
                <li>
                    <?php echo $this->Html->link(
                        $post['title'],
                        array(
                            'controller' => 'posts',
                            'action' => 'view',
                            $post['id']
                        )
                    ); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>