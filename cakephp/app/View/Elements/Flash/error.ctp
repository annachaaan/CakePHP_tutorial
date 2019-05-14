<!-- 失敗した時のフラッシュメッセージテンプレ -->
<div style="text-align:center;" id="<?php echo $key; ?>Message" class="alert alert-danger <?php echo !empty($params['class']) ? $params['class'] : 'message'; ?>">
    <?php echo $message; ?>
</div>
