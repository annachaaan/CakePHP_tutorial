<div class="m-4">
    <div class="profile">
        <h3 class="mt-2 mb-2"><?php echo ('name:' . $loginuser['User']['username']); ?></h3>
        <div class="btn-form d-flex flex-row-reverse">
        <?php
        if ($loginuser['User']['id'] == $auth) {
            echo $this->element('btn', ['id' => $loginuser['User']['id']]);
        } ?>
        </div>
        <?php echo 'email:' . $loginuser['User']['email']; ?>
        <br>
        <hr>
        <?php echo '住所: 〒' . $loginuser['User']['zipcode']; ?>
        <br>
        <?php echo $loginuser['User']['adress_auto'] . $loginuser['User']['adress_manual']; ?>
    </div>
    <div class="myposts">
        <ul><h4>My Posts</h4>
        <?php foreach ($loginuser['Post'] as $key => $post): ?>
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
