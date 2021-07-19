<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<a class="btn btn-sm"
   href="<?= base_url('admin/boxes-management') ?>">
	Back
</a>

<?= form_open('admin/boxes-management/edit',
	array('class' => 'card my-2')) ?>

<?php
echo form_label('ProductId', 'tbxId');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxId',
	'id' => 'tbxId',
	'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
	'readonly' => true,
));

echo form_label('Material', 'tbxMaterial');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxMaterial',
	'id' => 'tbxMaterial',
));

echo form_label('Width', 'tbxWidth');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxWidth',
	'id' => 'tbxWidth',
));

echo form_label('Height', 'tbxHeight');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxHeight',
	'id' => 'tbxHeight',
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