<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm"
   href="<?= base_url('admin/sprays-management') ?>">
	Back
</a>

<?= form_open('admin/sprays-management/add',
    array('class' => 'card my-2')
) ?>

<div class="card-body">
    <h5 class="card-title">Add new Spray</h5>
    <div class="card-text">
        <?= form_error(
            'db_err',
            '<div class="form-group text-danger">',
            '</div>'
        ); ?>
        <div class="form-group">
            <?php
            echo form_label('ProductId', 'tbxId');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxId',
                'id' => 'tbxId',
                'value' => isset($item->Id) ? $item->Id : set_value('tbxId'),
                'readonly' => true,
            ));
            echo form_error(
                'tbxName',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group">
			<?php
			echo form_label('Type', 'tbxType');
			echo form_input(array(
				'class' => 'form-control',
				'name' => 'tbxType',
				'id' => 'tbxType',
				'value' => isset($item->Type) ? $item->Type : set_value('tbxType'),
			));
			echo form_error(
				'tbxName',
				'<small class="form-text text-danger">',
				'</small>'); ?>
        </div>
        <div class="form-group">
			<?php
			echo form_label('Brand', 'tbxBrand');

			echo form_dropdown(
				array(
					'class' => 'form-control',
					'name' => 'tbxBrand',
					// $brands,		
				),
				$brands
			);
			?>
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
