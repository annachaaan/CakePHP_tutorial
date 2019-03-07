<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <link rel="stylesheet" href="/css/user/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <title>TUTORIAL</title>
    </head>
    <body>
        <div class="user-form">
            <header class="container-fluid">
                <?php echo $this->Html->link(
                    'TUTORIAL',
                    array('controller' => 'posts', 'action' => 'top')
                ); ?>
            </header>
            <div class="container">
    	        <?php echo $this->fetch('content'); ?>
            </div>
            <footer class="container-fluid">
                2019 CakePHP2 TUTORIAL
            </footer>
        </div>
    </body>
</html>
