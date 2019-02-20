<?php
    if(isset($user)):
        echo $this->Html->link(
            'Logout',
            array('controller' => 'users', 'action' => 'logout')
        );
        echo '<br/>';
        echo $this->Html->link(
            'Add post',
            array('controller' => 'posts', 'action' => 'add')
        );
        echo ', ';
        echo $this->Html->link(
            'Search',
            array('controller' => 'posts', 'action' => 'find')
        );
    else:
        echo $this->Html->link(
            'Sign up',
            array('controller' => 'users', 'action' => 'add')
        );
        echo ' or ';
        echo $this->Html->link(
            'Sign in',
            array('controller' => 'users', 'action' => 'login')
        );
    endif;
?>
