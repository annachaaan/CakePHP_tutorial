<style>
    label {
        width: 100%;
    }

    #PostelcodesCsvfile {
        display: none;
        /* アップロードボタンのスタイルを無効にする */
    }

    .submit {
        text-align: right;
    }

    .btn {
        background-color: #e2e2e2;
    }
</style>
<div class="mt-2 csv-form">
    <label><span class="btn"><?php echo __('Import CSVfile'); ?></span>
        <?php
        echo $this->Form->create('Postelcodes', array(
            'type' => 'file',
            'enctype' => 'multipart/form-data'
        ));
        echo $this->Form->input('csvfile', array('type' => 'file', 'label' => __('Select CSVfile')));
        echo $this->Form->Submit('Import', array(
            'class' => 'btn',
            'label' => __('Import')
        ));
        echo $this->Form->end();
        ?>
    </label>
</div>


<script>
    $(function() {
        $('#PostelcodesCsvfile').on("change", function() {
            var file = this.files[0];
            if (file != null) {
                console.log(file);
                $('span').text(file.name);
            }
        });
    });
</script>