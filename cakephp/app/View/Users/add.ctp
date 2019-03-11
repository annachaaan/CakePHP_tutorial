<div class="alert alert-info mt-4" role="alert">
  <h4 class="alert-heading">Sign Up</h4>
  <?php echo $this->Form->create('User'); ?>
  <fieldset>
      <?php
      echo $this->Form->input('username', array(
          'div' => array(
              'class' => 'form-group'),
          'class' => 'form-control'
      ));
      echo $this->Form->input('password', array(
          'div' => array(
              'class' => 'form-group'),
          'class' => 'form-control'
      ));
      echo $this->Form->input('role', array(
          'div' => array(
              'class' => 'form-group'),
          'options' => array('admin' => 'Admin', 'author' => 'Author'),
          'class' => 'form-control'
      )); ?>
  </fieldset>
  <hr>
  <?php echo $this->Form->submit('Sign Up', array(
      'div' => array(
          'class' => 'text-right'),
      'class' => 'btn btn-info mb-0',
  )); ?>
</div>
