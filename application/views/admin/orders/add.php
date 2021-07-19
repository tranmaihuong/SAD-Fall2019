<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a class="btn btn-sm"
   href="<?= base_url('admin/orders-management') ?>">
	Back
</a>

<?= form_open('admin/orders-management/add',
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
				<div class="form-group">
					<?php
					echo form_label('Skip to create for a new guest', 'tbxUserId');
					echo form_dropdown(
						'slUserId',
						$userOpts,
						isset($item->UserId)
							? $item->UserId
							: set_value('slUserId'),
						array(
							'class' => 'custom-select',
							'name' => 'slUserId',
							'id' => 'slUserId',
						));
					echo form_error(
						'slUserId',
						'<small class="form-text text-danger">',
						'</small>'); ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<?php
					echo form_label('UserName', 'tbxUserName');
					echo form_input(array(
						'class' => 'form-control',
						'name' => 'tbxUserName',
						'id' => 'tbxUserName',
						'value' => isset($item->UserName)
							? $item->UserName
							: set_value('tbxUserName'),
					));
					echo form_error(
						'tbxUserName',
						'<small class="form-text text-danger">',
						'</small>'); ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php
			echo form_label('PhoneNumber', 'tbxPhoneNumber');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxPhoneNumber',
				'id' => 'tbxPhoneNumber',
				'value' => isset($item->PhoneNumber)
					? $item->PhoneNumber
					: set_value('tbxPhoneNumber'),
			));
			echo form_error(
				'tbxPhoneNumber',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Address', 'tbxAddress');
			echo form_textarea(array(
				'class' => 'form-control',
				'name' => 'tbxAddress',
				'id' => 'tbxAddress',
				'rows' => 2,
				'value' => isset($item->Address)
					? $item->Address
					: set_value('tbxAddress'),
			));
			echo form_error(
				'tbxAddress',
				'<small class="form-text text-danger">',
				'</small>'); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Notes', 'tbxNotes');
			echo form_textarea(array(
				'class' => 'form-control',
				'name' => 'tbxNotes',
				'id' => 'tbxNotes',
				'rows' => 2,
				'value' => isset($item->Notes)
					? $item->Notes
					: set_value('tbxNotes'),
			));
			echo form_error(
				'tbxNotes',
				'<small class="form-text text-danger">',
				'</small>'); ?>
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

		<div class="row">
			<div class="col-6">
				<?php
				echo form_label('Select product', 'slProductIds[]');
				echo form_dropdown(
					'slProductIds[]',
					$productOpts,
					null,
					array(
						'class' => 'custom-select custom-select-sm',
						'name' => 'slProductIds[]',
						'id' => 'slProductIds[]',
					));
				?>
			</div>
			<div class="col-5">
				<?php
				echo form_label('Quantity', 'tbxQuantities[]');
				echo form_input(array(
					'type' => 'number',
					'class' => 'form-control form-control-sm',
					'name' => 'tbxQuantities[]',
					'id' => 'tbxQuantities[]',
					'value' => 0
				));
				?>
			</div>
			<div class="col-1 d-flex align-items-center justify-content-center">
				<a href="javascript:addProductSelection()">+</a>
			</div>
		</div>
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

<script>
const $formContent = $('form .card-text');

const addProductSelection = (el) => {
	const template = `
			<div class="row">
				<div class="col-6">
				<?php
	echo form_label('Select product', 'slProductIds[]');
	echo form_dropdown(
		'slProductIds[]',
		$productOpts,
		null,
		array(
			'class' => 'custom-select custom-select-sm',
			'name' => 'slProductIds[]',
			'id' => 'slProductIds[]',
		));
	?>
				</div>
				<div class="col-5">
				<?php
	echo form_label('Quantity', 'tbxQuantities[]');
	echo form_input(array(
		'type' => 'number',
		'class' => 'form-control form-control-sm',
		'name' => 'tbxQuantities[]',
		'id' => 'tbxQuantities[]',
		'value' => 0
	));
	?>
				</div>
				<div class="col-1 d-flex align-items-center justify-content-center">
					<a href="javascript:addProductSelection()">+</a>
				</div>
			</div>
		`
	$formContent.append(template);
}
</script>
