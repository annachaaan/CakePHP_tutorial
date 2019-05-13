<div class="m-4">
    <div class="text-secondary">
        <div class="alert alert-secondary" role="alert">
            <h3 class="alert-heading mt-2 mb-2"><?php echo ($user['User']['username']); ?></h3>
            <?php
            if ($user['User']['id'] == $auth) {
                echo $this->element('btn', ['id' => $user['User']['id']]);
            } ?>
            <p>住所</p>
            <p><?php echo '〒'.$user['User']['zipcode']; ?></p>
            <p><?php echo $user['User']['adress_auto'] . $user['User']['adress_manual']; ?></p>
        </div>
    </div>
</div>
