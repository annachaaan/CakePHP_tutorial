<div class="m-4">
    <div class="profile">
        <h3 class="mt-2 mb-2"><?php echo (__('Username : ') . $loginuser['User']['username']); ?></h3>
        <div class="btn-form d-flex flex-row-reverse">
            <?php
            if ($loginuser['User']['id'] == $auth) {
                echo $this->element('btn', ['id' => $loginuser['User']['id']]);
            } ?>
        </div>
        <?php echo __('Email : ') . $loginuser['User']['email']; ?>
        <br>
        <hr>
        <?php echo __('Adress : 〒') . $loginuser['User']['zipcode']; ?>
        <br>
        <?php echo $loginuser['User']['adress_auto'] . $loginuser['User']['adress_manual']; ?>
    </div>
    <div class="myposts">
        <ul><?php echo __('My Posts'); ?>
            <?php foreach ($loginuser['Post'] as $key => $post) : ?>
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