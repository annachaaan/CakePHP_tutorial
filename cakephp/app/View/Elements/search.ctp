<!-- サイドオープン時メインコンテンツを覆う -->
<div class="overlay" id="js__overlay"></div>

<!-- サイドメニュー -->
<nav class="side-menu">
    <ul>
        <!-- ログイン -->
        <?php if (isset($user)) : ?>
            <li>
                <?php
                echo $this->Html->link(
                    'MyPage',
                    array(
                        'controller' => 'users',
                        'action' => 'view',
                        $user['id']
                    )
                ); ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(
                    'Addpost',
                    array(
                        'controller' => 'posts',
                        'action' => 'add'
                    )
                ); ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(
                    'Logout',
                    array(
                        'controller' => 'users',
                        'action' => 'logout'
                    )
                ); ?>
            </li>

            <!-- 管理者 -->
            <li>
                <?php
                echo $this->Html->link(
                    'CSVImport',
                    array(
                        'controller' => 'postelcodes',
                        'action' => 'index'
                    )
                ); ?>
            </li>

        <?php else : ?>
            <!-- ゲスト -->
            <li>
                <?php
                echo $this->Html->link(
                    'Sign up',
                    array(
                        'controller' => 'users',
                        'action' => 'add'
                    )
                ); ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(
                    'Sign in',
                    array(
                        'controller' => 'users',
                        'action' => 'login'
                    )
                ); ?>
            </li>
        <?php endif; ?>
        <?php if (false !== strpos($this->name, 'Posts')) : ?>
            <li id="search-menu">記事検索
                <ul id="search-item">
                    <?php echo $this->Form->create('Post', array(
                        'url' => '/',
                        'id' => array('id' => 'PostIndex')
                    )); ?>
                    <?php echo $this->Form->input('category_id', array(
                        'label' => 'カテゴリー',
                        'empty' => true,
                        'value' => ''
                    )); ?>
                    <?php
                    if ($this->Html->url() == '/') {
                        echo $this->Form->input('tag_id', array(
                            'label' => 'タグ',
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'options' => $tag_id
                        ));
                    } else {
                        echo $this->Form->input('tag_id', array(
                            'label' => 'タグ',
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            // 'options' => $tag_id
                        ));
                    } ?>
                    <?php echo $this->Form->input('title', array(
                        'label' => 'タイトル',
                        'type' => 'text',
                        'empty' => true,
                        'div' => array(
                            'class' => 'form-group'
                        ),
                        'class' => 'form-control',
                        'empty' => true,
                        'value' => '',
                        'required' => false
                    )); ?>
                    <?php echo $this->Form->submit('Search', array(
                        'div' => array(
                            'class' => 'text-right'
                        ),
                        'class' => 'btn btn-outline-secondary p-0',
                        'name' => 'search'
                    )); ?>
                    <?php echo $this->Form->end(); ?>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<!-- 開閉用ボタン -->
<div class="side-menu-btn" id="js__sideMenuBtn">
    <p>MENU</p>
</div>