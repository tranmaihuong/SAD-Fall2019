<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" -->
 <?php
       echo form_open('AuthenticationController/login_post', ['id' => 'frmUsers']);
       echo ('Login form');
       ?>
<br/>
<?php
       echo form_label('Email', 'email');

       echo form_input(['name' => 'email', "<?php echo set_value('email'); ?>", 'span' => 'text_error']);

       echo form_error('email');
       ?>
 <br/>
 <?php
       echo form_label('Password', 'password');
       echo form_input(['type' => 'password', 'name' => 'password', "<?php echo set_value('password'); ?>", 'span' => 'text_error']);
       echo form_error('password');
       ?>
 <br />
 <?php

       echo form_submit('btnSubmit', 'Log In');
       ?>
 <br />
 <?php

       echo ('I do not have any account ');
       ?>
 <br />
 <?php

       echo anchor('AuthenticationController/register', 'Create a new account');
       ?>

 <?php
       echo $this->session->flashdata('error');

       echo form_close();
       ?> 