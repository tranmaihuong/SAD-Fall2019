<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>

<a class="btn btn-sm"
   href="<?= base_url('admin/orders-management') ?>">
	Back
</a>

<?= form_open("admin/orders-management/$item->Id/details",
	array('class' => 'card my-2')) ?>
<div class="card-body">
	<h5 class="card-title">Create new order</h5>
	<div class="card-text">
		<?= form_error(
			'db_err',
			'<div class="form-group text-danger">',
			'</div>'); ?>
		<div class="row">
			<div class="col-6">
				<label>Email</label>
				<p><?= isset($user) ? $user->Email : '' ?></p>
			</div>
			<div class="col-6">
				<label>UserName</label>
				<p><?= $item->UserName ?></p>
			</div>
		</div>
		<div class="form-group">
			<label>PhoneNumber</label>
			<p><?= $item->PhoneNumber ?></p>
		</div>
		<div class="form-group">
			<label>Address</label>
			<p><?= $item->Address ?></p>
		</div>
		<div class="form-group">
			<label>Notes</label>
			<p><?= $item->Notes ?></p>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Status', 'tbxStatus');
			echo form_dropdown(
				'slStatus',
				$orderStatus,
				isset($item->Status)
					? $item->Status
					: set_value('slStatus'),
				array(
					'class' => 'custom-select',
					'name' => 'slStatus',
					'id' => 'slStatus',
				));
			echo form_error(
				'tbxStatus',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>

		<hr/>

		<table class="table table-borderless">
			<thead>
			<tr>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $p): ?>
				<tr>
					<td><?= $p->Name ?></td>
					<td><?= $p->Quantity ?></td>
					<td><?= $p->Quantity * $p->Price ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="card-footer text-right">
	<?= form_button(array(
		'type' => 'submit',
		'class' => 'btn btn-sm btn-outline-dark',
		'content' => 'Submit'
	)); ?>
</div>
<?= form_close() ?>
