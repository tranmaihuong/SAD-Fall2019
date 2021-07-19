<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm" href="<?= base_url('admin/brands-management') ?>">
	Back
</a>

<?= form_open(
	'admin/brands-management/edit',
	array('class' => 'card my-2')
) ?>

<div class="card-body">
	<h5 class="card-title">Add new brand</h5>
	<div class="card-text">
		<?= form_error(
			'db_err',
			'<div class="form-group text-danger">',
			'</div>'
		); ?>
		<div class="form-group">
			<?php
			echo form_label('Id', 'tbxId');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxId',
				'id' => 'tbxId',
				'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
				'readonly' => true,
			));
			echo form_error(
				'tbxId',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Name', 'tbxName');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxName',
				'id' => 'tbxName',
				'value' => isset($item->Name) ? $item->Name : set_value('tbxName'),
			));
			echo form_error(
				'tbxName',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
	</div>
</div>
<div class="card-footer text-right">
	<?= form_button(array(
		'type' => 'submit',
		'class' => 'btn btn-sm btn-outline-dark',
		'name' => 'btnSubmit',
		'id' => 'btnSubmit',
		'content' => 'Submit'
	)); ?>
</div>
<?= form_close() ?>