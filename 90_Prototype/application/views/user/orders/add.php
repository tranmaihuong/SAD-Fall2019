<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<a class="btn btn-sm"
   href="<?= base_url('user/') ?>">
	Back
</a>

<?= form_open('user/orders/add',
	array('class' => 'card my-2')) ?>

<?php


echo form_label('UserName', 'tbxUserName');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxUserName',
	'id' => 'tbxUserName',
));

echo form_label('Address', 'tbxAddress');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxAddress',
	'id' => 'tbxAddress',
));

echo form_label('PhoneNumber', 'tbxPhone');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPhone',
	'id' => 'tbxPhone',
));




// quantity
// echo form_label('Quantity', 'tbxQuantity');
// echo form_input(array(
// 	'class' => 'form-control',
// 	'name' => 'tbxQuantity',
// 	'id' => 'tbxQuantity',
// ));
echo form_label('Price per Unit', 'tbxPrice');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxPrice',
	'id' => 'tbxPrice',
	'value' => isset($detail->Price) ? $detail->Price : set_value('tbxPrice'),
	'readonly' => false,
));


echo form_label('ProductId', 'tbxProductId');
// print_r ($detail->Id);
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxProductId',
	'id' => 'tbxProductId',
	'value' => $detail->Id,
	'readonly' => true,
));
?>
<br>
<?php
echo form_label('ProductName', 'tbxProductName');
echo ($detail->Name);
?>
<br>
<br>
<?php
echo form_label('Quantity', 'tbxQuantities');
echo form_input(array(
	'type' => 'number',
	'class' => 'form-control form-control-sm',
	'name' => 'tbxQuantities',
	'id' => 'tbxQuantities',
	'value' => 1
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