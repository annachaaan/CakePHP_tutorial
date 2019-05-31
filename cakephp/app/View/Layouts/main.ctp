<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/search.js"></script>
    <script type="text/javascript" src="/js/category.js"></script>
    <script type="text/javascript" src="/js/category-search.js"></script>
    <script type="text/javascript" src="/js/postalcode.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-sidebar/3.1.0/jquery.sidebar.min.js"></script>
    <link rel="stylesheet" href="/css/lightbox.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="stylesheet" href="/css/master.css">
    <script type="text/javascript" src="/js/lightbox.js"></script>
    <meta charset="utf-8">
    <title>PAGETITLE</title>
</head>

<body>
    <!-- サイドメニュー -->
    <?php echo $this->element('search'); ?>
    <div class="wrapper">
        <div id="title">
            <?php echo $this->Html->link(
                'PAGE TITLE',
                array(
                    'controller' => 'posts',
                    'action' => 'index'
                )
            ); ?>
            <p>testtesttesttesttesttest</p>
        </div>
        <div class="main">
            <hr>
            <!-- フラッシュメッセージ -->
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <footer class="p-3 text-center">
            2019 CakePHP2 TUTORIAL
        </footer>
    </div>
</body>

</html>