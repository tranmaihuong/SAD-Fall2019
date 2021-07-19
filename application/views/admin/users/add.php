<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<a class="btn btn-sm"
   href="<?= base_url('admin/users-management') ?>">
	Back
</a>

<h3 class="card-title">Add new User</h3>

<?= form_open('admin/users-management/add',
	array('class' => 'card my-2')) ?>

<?php
echo form_label('Id', 'tbxId');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxId',
	'id' => 'tbxId',
	'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
	'readonly' => true,
));

echo form_label('Name', 'tbxName');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxName',
	'id' => 'tbxName',
));

echo form_label('Email', 'tbxEmail');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxEmail',
	'id' => 'tbxEmail',
));

echo form_label('PhoneNumber', 'tbxPhone');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPhone',
	'id' => 'tbxPhone',
));

echo form_label('Address', 'tbxAddress');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxAddress',
	'id' => 'tbxAddress',
));

echo form_label('Birthday', 'tbxBirthday');
echo form_input(array(
	'type' => 'date',
	'class' => 'control',
	'name' => 'tbxBirthday',
	'id' => 'tbxBirthday',
));


echo form_label('Password', 'tbxPassword');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPassword',
	'id' => 'tbxPassword',
));

echo form_label('Type', 'tbxType');
echo form_dropdown(array(
	'class' => 'form-control',
	'name' => 'tbxType',
	'id' => 'tbxType',
),array("0","1"),
);
?>
<br>
<br>
<?php

echo form_button(array(
	'type' => 'submit',
	'class' => 'btn btn-sm btn-outline-dark',
	'name' => 'btnSubmit',
	'id' => 'btnSubmit',
	'content' => 'Submit'
));
?>

<?= form_close() ?>