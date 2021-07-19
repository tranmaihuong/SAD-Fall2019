<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2> Product Information </h2>
<a href="<?= base_url("user/orders/add/$item->Id") ?>"
   class="btn btn-sm btn-primary">Buy this product</a>
<table class="table table-hover">
	<thead>
	<th>Name</th>
	<th>Price</th>
	<th></th>
	</thead>
	<tbody>
	
		<tr>
			<td><?= $item->Name?></td>
			<td><?= $item->Price?></td>
		</tr>

	</tbody>
</table>
<h2> Comments </h2>
<?php foreach ($allComments as $row): ?>
<table class="table table-hover">
	<thead>
	<th><?= $row->UserName ?></th>
	<th></th>
	<th></th>
	<th></th>
	</thead>
	<tbody>

		<tr>
		
			<td><?= $row->Content ?></td>
			<td></td>
		
		</tr>
	<?php endforeach; ?>
	
	</tbody>
	
</table> 
<?= form_open('user/product/detail/comment') ;
?>

<?php
form_label('ProductId', 'tbxId');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxId',
	'id' => 'tbxId',
	'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
	'readonly' => true,
	'type' =>'hidden',
));

echo form_label('Username', 'tbxName');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxName',
	'id' => 'tbxName',
));

echo form_label('Content', 'tbxContent');
echo form_input(array(
	'class' => 'form-control',
	'name' => 'tbxContent',
	'id' => 'tbxContent',
));

echo form_button(array(
	'type' => 'Save',
	'class' => 'btn btn-sm btn-outline-dark',
	'name' => 'btnSave',
	'id' => 'btnSave',
	'content' => 'Save'
)
);
?>

<?= form_close() ?>

				 