<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/tutorial.js"></script>
        <link rel="stylesheet" href="/css/lightbox.css">
        <link rel="stylesheet" href="/css/master.css">
        <script type="text/javascript" src="/js/lightbox.js"></script>
        <meta charset="utf-8">
        <title>PAGE</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div>
                <ul>
                    <?php if (isset($user)): ?>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Logout', array(
                                    'controller' => 'users',
                                    'action' => 'logout'
                                )); ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Edit', array(
                                    'controller' => 'users',
                                    'action' => 'edit',
                                    $user['id']
                                )); ?>
                        </li>
                    <?php else: ?>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Sign up', array(
                                    'controller' => 'users',
                                    'action' => 'add'
                                )); ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Sign in', array(
                                    'controller' => 'users',
                                    'action' => 'login'
                                )); ?>
                        </li>
                    <?php endif; ?>
                    <li>/</li>
                    <?php if (isset($user)): ?>
                        <li>
                            <?php
                            echo $this->Html->link(
                                'Add post',
                                array(
                                    'controller' => 'posts',
                                    'action' => 'add'
                                )); ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <div class="container">
            <?php echo $this->Html->link(
                'PAGE', array(
                    'controller' => 'posts',
                    'action' => 'index'
                ),array (
                    'class' => 'navbar-brand',
                ));
            ?>
            <?php if ($this->Html->url('', false) != '/'): ?>
                <div class="btn-wrapper">
                    <div class="bnrL">
                        <ul>
                            <?php echo $this->Form->create('Post', array(
                                'url' => '/',
                                'id' => array('id' => 'PostIndex')
                            )); ?>
                            <?php echo $this->Form->input('category_id', array(
                                'label' => 'カテゴリー',
                                'empty' => true,
                                'value' => ''
                            )); ?>
                            <?php echo $this->Form->input('tag_id', array(
                                'label' => 'タグ',
                                'type' => 'select',
                                'multiple' => 'checkbox',
                                // 'options' => $tag_id
                            )); ?>
                            <?php echo $this->Form->input('title', array(
                                'label' => 'タイトル',
                                'type' => 'text',
                                'empty' => true,
                                'div' => array(
                                    'class' => 'form-group'),
                                'class' => 'form-control',
                                'empty' => true,
                                'value' => '',
                                'required' => false
                            )); ?>
                            <hr>
                            <?php echo $this->Form->submit('Search', array(
                                'div' => array(
                                    'class' => 'text-right'),
                                'class' => 'btn btn-secondary mb-0',
                                'name' => 'search'
                            )); ?>
                            <?php echo $this->Form->end(); ?>
                        </ul>
                        <button class="btn" type="button" name="button">search</button>
                    </div>
                </div>
            <?php endif; ?>
    	    <?php echo $this->fetch('content'); ?>
        </div>
        <footer class="p-3 text-center">
            2019 CakePHP2 TUTORIAL
        </footer>
    </body>
</html>

<!-- <?php debug($user); ?> -->
