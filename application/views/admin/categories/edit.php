<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm" href="<?= base_url('admin/categories-management') ?>">
	Back
</a>

<?= form_open(
	'admin/categories-management/edit',
	array('class' => 'card my-2')
) ?>

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

echo form_label('ParentId', 'tbxParentId');
echo form_dropdown(
	array(
		'class' => 'form-control',
		'name' => 'tbxParentId',
		'id' => 'tbxParentId',
	),
	$categories1
);


// echo form_input(array(
// 	'class' => 'form-control',
// 	'name' => 'tbxParentId',
// 	'id' => 'tbxParentId',
// 	'value' => $item->ParentId,
// ));

// echo form_dropdown(
// 	array(
// 		'class' => 'form-control',
// 		'name' => 'CategoryId',
// 		'id' => 'CategoryId',
// 	),
// 	$categories
// );



echo form_button(array(
	'type' => 'submit',
	'class' => 'btn btn-sm btn-outline-dark',
	'name' => 'btnSubmit',
	'id' => 'btnSubmit',
	'content' => 'Submit'
));
?>

<?= form_close() ?>