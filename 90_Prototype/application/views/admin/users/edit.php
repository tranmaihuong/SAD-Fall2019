<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<a class="btn btn-sm"
   href="<?= base_url('admin/users-management') ?>">
	Back
</a>

<?= form_open('admin/users-management/edit',
	array('class' => 'card my-2')) ?>

<?php
echo form_label('Id', 'tbxId');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxId',
	'id' => 'tbxId',
	'value' => $item->Id,
	'readonly' => true,
));

echo form_label('Name', 'tbxName');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxName',
    'id' => 'tbxName',
    'value' => $item->Name,
));

echo form_label('Email', 'tbxEmail');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxEmail',
    'id' => 'tbxEmail',
    'value' => $item->Email,
));

echo form_label('PhoneNumber', 'tbxPhone');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPhone',
    'id' => 'tbxPhone',
    'value' => $item->PhoneNumber,
));

echo form_label('Address', 'tbxAddress');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxAddress',
    'id' => 'tbxAddress',
    'value' => $item->Address,
));

echo form_label('Birthday', 'tbxBirthday');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxBirthday',
    'id' => 'tbxBirthday',
    'value' => $item->Birthday,
));

echo form_label('Password', 'tbxPassword');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPassword',
    'id' => 'tbxPassword',
    'value' => $item->Password,
));

echo form_label('Type', 'tbxType');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxType',
    'id' => 'tbxType',
    'value' => $item->Type,
));

echo form_label('Note', 'tbxNote');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxNote',
    'id' => 'tbxNote',
    'value' => $item->Note,
));

echo form_button(array(
	'type' => 'submit',
	'class' => 'btn btn-sm btn-outline-dark',
	'name' => 'btnSubmit',
	'id' => 'btnSubmit',
	'content' => 'Submit'
));
?>

<?= form_close() ?>