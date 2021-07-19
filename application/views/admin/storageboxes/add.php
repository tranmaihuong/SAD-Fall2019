<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm" href="<?= base_url('admin/boxes-management') ?>">
	Back
</a>

<?= form_open(
	'admin/boxes-management/add',
	array('class' => 'card my-2')
) ?>
<div class="card-body">
	<h5 class="card-title">Add new Storage Box</h5>
	<div class="card-text">
		<?= form_error(
			'db_err',
			'<div class="form-group text-danger">',
			'</div>'
		); ?>
		<div class="form-group product-id">
			<?php
			echo form_label('ProductId', 'tbxId');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxId',
				'id' => 'tbxId',
				'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
				'readonly' => true,
			)); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Brand', 'BrandId');

			echo form_dropdown(
				array(
					'class' => 'form-control',
					'name' => 'BrandId',
					'id' => 'BrandId',
				),
				$brands,
				// $option1
			);
			?>
		</div>
		<div class="form-group ">
			<?php
			echo form_label('Category', 'CategoryId');

			echo form_dropdown(
				array(
					'class' => 'form-control',
					'name' => 'CategoryId',
					'id' => 'CategoryId',
				),
				$categories,
				// $option2
			);
			?>
		</div>
		<div class="form-group ">
			<?php
			echo form_label('Name', 'tbxName');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxName',
				'id' => 'tbxName',
				'value' => isset($item->price) ? $item->price : set_value('tbxName'),
			));
			echo form_error(
				'tbxName',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group">
			<?php
			echo form_label('Price', 'tbxPrice');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxPrice',
				'id' => 'tbxPrice',
				'type' => 'number',
				'min' => '10000',
				'step' => '10000',
				'value' => isset($item->Price) ? $item->Price : set_value('tbxPrice'),
			));
			echo form_error(
				'tbxPrice',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
        
		</div>
		<div class="form-group">
			<?php
			echo form_label('Material', 'tbxMaterial');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxMaterial',
				'id' => 'tbxMaterial',
			));
			echo form_error(
				'tbxMaterial',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		
		<div class="form-group">
			<?php
			echo form_label("Width", 'tbxWidth');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxWidth',
				'id' => 'tbxWidth',
				'value' => isset($item->Width) ? $item->Width : set_value('tbxWidth'),
			));
			echo form_error(
				'tbxWidth',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>

		<div class="form-group">
			<?php
			echo form_label("Height", 'tbxHeight');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxHeight',
				'id' => 'tbxHeight',
				'value' => isset($item->Height) ? $item->Height : set_value('tbxHeight'),
			));
			echo form_error(
				'tbxHeight',
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