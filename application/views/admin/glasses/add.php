<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm" href="<?= base_url('admin/glasses-management') ?>">
	Back
</a>

<?= form_open(
	'admin/glasses-management/add',
	array('class' => 'card my-2')
) ?>
<div class="card-body">
	<h5 class="card-title">Add new glasses</h5>
	<div class="card-text">
		<?= form_error(
			'db_err',
			'<div class="form-group text-danger">',
			'</div>'
		); ?>
		<div class="form-group product-id">
			<?php
			echo form_label('Id', 'tbxId');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxId',
				'id' => 'tbxId',
				'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
				'readonly' => true,
			)); ?>
		</div>
		<div class="form-group glasses-brand">
			<?php
			echo form_label('Brand', 'BrandId');

			echo form_dropdown(
				array(
					'class' => 'form-control',
					'name' => 'BrandId',
					'id' => 'BrandId',
				),
				$brands
				// $option1
			);
			?>
		</div>
		<div class="form-group glasses-category">
			<?php
			echo form_label('Category', 'CategoryId');

			echo form_dropdown(
				array(
					'class' => 'form-control',
					'name' => 'CategoryId',
					'id' => 'CategoryId',
				),
				$categories
				// $option2
			);
			?>
		</div>
		<div class="form-group glasses-name">
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
		<div class="form-group glasses-price">
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
		<div class="form-group glasses-gender">
			<?php
			echo form_label('Gender', 'tbxGender');
			?>
			<br>
			<?php
			echo form_label('Male', 'tbxGender');
			echo form_radio(array(
				'name' => 'tbxGender',
				'id' => 'tbxGender',
				'value' => 1,
			));
			echo form_label('Female', 'tbxGender');
			echo form_radio(array(
				'name' => 'tbxGender',
				'id' => 'tbxGender',
				'value' => 2,
			));
			echo form_label('Others', 'tbxGender');
			echo form_radio(array(
				'name' => 'tbxGender',
				'id' => 'tbxGender',
				'value' => 0,
			));
			echo form_error(
				'tbxGender',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-shape">
			<?php
			echo form_label('Shape', 'tbxShape');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxShape',
				'id' => 'tbxShape',
				'value' => isset($item->Shape) ? $item->Shape : set_value('tbxShape'),
			));
			echo form_error(
				'tbxShape',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-material">
			<?php
			echo form_label('Material', 'tbxMaterial');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxMaterial',
				'id' => 'tbxMaterial',
				'min' => '1',
				'value' => isset($item->Material) ? $item->Material : set_value('tbxMaterial'),
			));
			echo form_error(
				'tbxMaterial',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-lens-width">
			<?php
			echo form_label("Lens' Width", 'tbxLensWidth');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxLensWidth',
				'id' => 'tbxLensWidth',
				'type' => 'number',
				'min' => '1',
				'value' => isset($item->LensWidth) ? $item->LensWidth : set_value('tbxLensWidth'),
			));
			echo form_error(
				'tbxLensWidth',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-lens-width-without-frame">
			<?php
			echo form_label("Lens' Width Without Frame", 'tbxLensWidthWithoutFrame');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxLensWidthWithoutFrame',
				'id' => 'tbxLensWidthWithoutFrame',
				'type' => 'number',
				'min' => '1',
				'value' => isset($item->LensWidthWithoutFrame) ? $item->LensWidthWithoutFrame : set_value('tbxLensWidthWithoutFrame'),
			));
			echo form_error(
				'tbxLensWidthWithoutFrame',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-height">
			<?php
			echo form_label('Lens Height', 'tbxLensHeight');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxLensHeight',
				'id' => 'tbxLensHeight',
				'type' => 'number',
				'min' => '1',
				'value' => isset($item->LensHeight) ? $item->$LensHeight : set_value('tbxLensHeight'),
			));
			echo form_error(
				'tbxLensHeight',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-arm-length">
			<?php
			echo form_label("Arm's Length", 'tbxArmLength');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxArmLength',
				'id' => 'tbxArmLength',
				'type' => 'number',
				'min' => '1',
				'value' => isset($item->ArmLength) ? $item->ArmLength : set_value('tbxArmLength'),
			));
			echo form_error(
				'tbxArmLength',
				'<small class="form-text text-danger">',
				'</small>'
			); ?>
		</div>
		<div class="form-group glasses-bridge-width">
			<?php
			echo form_label("Bridge's Width", 'tbxBridgeWidth');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxBridgeWidth',
				'id' => 'tbxBridgeWidth',
				'type' => 'number',
				'value' => isset($item->BridgeWidth) ? $item->BridgeWidth : set_value('tbxBridgeWidth'),
			));
			echo form_error(
				'tbxBridgeWidth',
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
