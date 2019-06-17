<div>
    <?php echo $this->Html->link(__('New Category'), array('controller' => 'Categories', 'action' => 'add')); ?>
</div>

<div>
    <ul>
        <?php foreach ($categories as $key => $category) : ?>
            <li>
                <?php
                echo $this->Html->link(
                    $category['Category']['category'],
                    array(
                        'action' => 'edit',
                        $category['Category']['id'],
                        'admin' => true
                    )
                );
                echo $this->element('btn', array(
                    'id' => $category['Category']['id'],
                    'boolean' => true
                ));
                ?>

                <!-- このタグリストをアコーディオンにしたい（クリックしたらタグが見れる） -->
                <ul>
                    <?php foreach ($category['Tag'] as $key => $tag) : ?>
                        <li><?php echo $tag['tag']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
</div>