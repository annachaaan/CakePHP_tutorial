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
        <script type="text/javascript" src="/js/lightbox.js"></script>
        <meta charset="utf-8">
        <title>TUTORIAL</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <?php echo $this->Html->link(
                'TUTORIAL', array(
                    'controller' => 'posts',
                    'action' => 'index'
                ),array (
                    'class' => 'navbar-brand text-light',
                ));
            ?>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (isset($user)): ?>
                        <li class="nav-item">
                            <?php
                            echo $this->Html->link(
                                'Logout', array(
                                    'controller' => 'users',
                                    'action' => 'logout'
                                ) , array(
                                    'class' => 'nav-link text-light'
                            )); ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?php
                            echo $this->Html->link(
                                'Sign up', array(
                                    'controller' => 'users',
                                    'action' => 'add'
                                ), array(
                                    'class' => 'nav-link text-light'
                            )); ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            echo $this->Html->link(
                                'Sign in', array(
                                    'controller' => 'users',
                                    'action' => 'login'
                                ), array(
                                    'class' => 'nav-link text-light'
                            )); ?>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link disabled text-white" href="#">/</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        echo $this->Html->link(
                            'Post top',array(
                                'controller' => 'posts',
                                'action' => 'index'
                            ), array(
                                'class' => 'nav-link text-light'
                        )); ?>
                    </li>
                    <?php if (isset($user)): ?>
                        <li class="nav-item">
                            <?php
                            echo $this->Html->link(
                                'Add post',
                                array(
                                    'controller' => 'posts',
                                    'action' => 'add'
                                ), array(
                                    'class' => 'nav-link text-light'
                            )); ?>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->Html->url('', false) != '/'): ?>
                        <li><button class="btn btn-info search-btn" type="button" name="button">Search post</button></li>
                    <?php endif; ?>
                    <div class="search-area alert alert-info mt-4" role="alert">
                        <h4 class="alert-heading">Search</h4>
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
                            'validate' => false
                        )); ?>
                        <hr>
                        <?php echo $this->Form->submit('Search', array(
                            'div' => array(
                                'class' => 'text-right'),
                            'class' => 'btn btn-info mb-0',
                            'name' => 'search'
                        )); ?>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </ul>
            </div>
        </nav>
        <div class="container">
    	    <?php echo $this->fetch('content'); ?>
        </div>
        <footer class="p-3 text-center">
            2019 CakePHP2 TUTORIAL
        </footer>
    </body>
</html>
