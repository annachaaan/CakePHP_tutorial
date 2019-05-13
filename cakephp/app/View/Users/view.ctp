<div class="m-4">
    <div class="title">
        <h3 class="mt-2 mb-2"><?php echo ('name:' . $user['User']['username']); ?></h3>
        <div class="btn-form d-flex flex-row-reverse">
        <?php
        if ($user['User']['id'] == $auth) {
            echo $this->element('btn', ['id' => $user['User']['id']]);
        } ?>
        </div>
        <?php echo 'email:' . $user['User']['email']; ?>
        <br>
        <hr>
        <?php echo '住所: 〒' . $user['User']['zipcode']; ?>
        <br>
        <?php echo $user['User']['adress_auto'] . $user['User']['adress_manual']; ?>
    </div>
</div>