<!-- サイドオープン時メインコンテンツを覆う -->
<div class="overlay" id="js__overlay"></div>

<!-- サイドメニュー -->
<nav class="side-menu">
    <ul>
        <!-- ログイン -->
        <?php if (isset($user)) : ?>
            <?php if ($user['role'] === 'author') : ?>
            <li>
                <?php
                echo $this->Html->link(
                    __('MyPage'),
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
                    __('Addpost'),
                    array(
                        'controller' => 'posts',
                        'action' => 'add'
                    )
                ); ?>
            </li>
            <?php endif; ?>
            <li>
                <?php
                echo $this->Html->link(
                    __('Logout'),
                    array(
                        'controller' => 'users',
                        'action' => 'logout'
                    )
                ); ?>
            </li>

            <!-- 管理者 -->
            <?php if ($user['role'] == 'admin') : ?>
            <li>
                <?php
                echo $this->Html->link(
                    __('CSVImport'),
                    array(
                        'controller' => 'postelcodes',
                        'action' => 'index',
                        'admin' => true
                    )
                ); ?>
            </li>
            <!-- 管理者 -->
            <li>
                <?php
                echo $this->Html->link(
                    __('Category&Tag Edit'),
                    array(
                        'controller' => 'categories',
                        'action' => 'index',
                        'admin' => true
                    )
                ); ?>
            </li>
            <?php endif; ?>

        <?php else : ?>
            <!-- ゲスト -->
            <li>
                <?php
                echo $this->Html->link(
                    __('Sign up'),
                    array(
                        'controller' => 'users',
                        'action' => 'add',
                        'admin' => false
                    )
                ); ?>
            </li>
            <li>
                <?php
                echo $this->Html->link(
                    __('Sign in'),
                    array(
                        'controller' => 'users',
                        'action' => 'login'
                    )
                ); ?>
            </li>
        <?php endif; ?>

        <!-- 検索欄はPostsControllerのみ -->
        <?php if (false !== strpos($this->name, 'Posts')) : ?>
            <li id="search-menu">
                <?php echo __('Search post'); ?>
                <ul id="search-item">
                    <?php echo $this->Form->create('Post', array(
                        'url' => '/',
                        'id' => array('id' => 'PostIndex')
                    )); ?>
                    <?php echo $this->Form->input('category_id', array(
                        'label' => __('Category'),
                        'empty' => true,
                        'value' => '',
                        'div' => array(
                            'class' => 'form-group'
                        ),
                        'class' => 'form-control',
                        'id' => 'search',
                    )); ?>
                    <div class="input select" id="select-tag">
                        <label for="check"><?php echo __('Tag'); ?></label>
                    </div>
                    <?php echo $this->Form->input('title', array(
                        'label' => __('Title'),
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
                        'label' => __('Search'),
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
    <p><?php echo __('Menu'); ?></p>
</div>