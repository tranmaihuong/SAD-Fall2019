<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" -->
<?php
echo form_open('AuthenticationController/register_post', ['id' => 'frmNewUser']);

echo ('Register form');
?>
<br />
<?php
echo form_label('Email', 'email');

echo form_input(['name' => 'email', "<?php echo set_value('email'); ?>", 'span' => 'text_error']);

echo form_error('email');
?>
<br />
<?php
echo form_label('User Name', 'username');

echo form_input(['name' => 'username', "<?php echo set_value('username'); ?>", 'span' => 'text_error']);

echo form_error('username');
?>
<br />
<?php
echo form_label('Address', 'address');

echo form_input(['name' => 'address', "<?php echo set_value('address'); ?>", 'span' => 'text_error']);

echo form_error('address');
?>
<br />
<br />
<?php
echo form_label('Birthday', 'birthday');

echo form_input(['type' => 'date', 'name' => 'birthday', "<?php echo set_value('birthday'); ?>", 'span' => 'text_error']);

echo form_error('birthday');
?>
<br />

<?php
echo form_label('Phone Number', 'phone');

echo form_input(['type' => 'tel', 'name' => 'phone', "<?php echo set_value('phone'); ?>", 'span' => 'text_error']);

echo form_error('phone');
?>
<br />
<?php
echo form_label('Password', 'password');
echo form_input(['type' => 'password', 'name' => 'password', "<?php echo set_value('password'); ?>", 'span' => 'text_error']);
echo form_error('password');
?> <br />

<?php
echo form_label('Password Confirmation', 'passconf');
echo form_input(['type' => 'password', 'name' => 'passconf', "<?php echo set_value('passconf'); ?>", 'span' => 'text_error']);
echo form_error('passconf');
?> <br />

<?php

echo form_submit('btnSubmit', 'Sign Up');
?>
<br />


<?php

echo $this->session->flashdata('error');
echo form_close();
?>