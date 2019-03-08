<div class="alert alert-info mt-4" role="alert">
  <h4 class="alert-heading">Sign In</h4>
  <?php echo $this->Flash->render('auth'); ?>
  <?php echo $this->Form->create('User'); ?>
  <legend>
      <?php echo __('Please enter your username and password'); ?>
  </legend>
  <fieldset>
      <?php
      echo $this->Form->input('username', array(
          'div' => array(
              'class' => 'form-group'
          ),
          'class' => 'form-control'
      ));
      echo $this->Form->input('password', array(
          'div' => array(
              'class' => 'form-group'
          ),
          'class' => 'form-control'
      )); ?>
  </fieldset>
  <hr>
  <?php echo $this->Form->submit('Sign In', array(
      'div' => array(
          'class' => 'text-right'
      ),
      'class' => 'btn btn-info mb-0',
  )); ?>
</div>
