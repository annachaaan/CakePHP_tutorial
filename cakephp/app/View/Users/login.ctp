<div class="main">
    <div class="admin-link">
        <?php echo $this->element('Admin/header'); ?>
    </div>
    <div class="form">
        <h1>User Sign in</h1>
    </div>
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
