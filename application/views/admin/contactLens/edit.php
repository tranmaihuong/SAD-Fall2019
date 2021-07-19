<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a class="btn btn-sm" href="<?= base_url('admin/contactlens-management') ?>">
    Back
</a>

<?= form_open(
    'admin/contactlens-management/edit',
    array('class' => 'card my-2')
) ?>
<div class="card-body">
    <h5 class="card-title">Edit <?php $name ?></h5>
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
        <div class="form-group contactLens-brand">
            <?php
            echo form_label('Brand', 'BrandId');

            echo form_dropdown(
                array(
                    'class' => 'form-control',
                    'name' => 'BrandId',
                    'id' => 'BrandId',
                    'selected' => isset($product->BrandId) ? $product->BrandId : set_value('tbxBrand'),
                ),
                $brands
            );
            ?>
        </div>
        <div class="form-group contactLens-category">
            <?php
            echo form_label('Category', 'CategoryId');

            echo form_dropdown(
                array(
                    'class' => 'form-control',
                    'name' => 'CategoryId',
                    'id' => 'CategoryId',
                    'selected' => isset($product->CategoryId) ? $product->CategoryId : set_value('tbxCategory'),
                ),
                $categories
            );
            ?>
        </div>
        <div class="form-group contactLens-name">
            <?php
            echo form_label('Name', 'tbxName');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxName',
                'id' => 'tbxName',
                'value' => isset($product->Name) ? $product->Name : set_value('tbxName'),
            ));
            echo form_error(
                'tbxName',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group contactLens-price">
            <?php
            echo form_label('Price', 'tbxPrice');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxPrice',
                'id' => 'tbxPrice',
                'type' => 'number',
                'min' => '10000',
                'step' => '5000',
                'value' => isset($product->Price) ? $product->Price : set_value('tbxPrice'),
            ));
            echo form_error(
                'tbxPrice',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group contactLens-Package">
            <?php
            echo form_label('Package', 'tbxPackage');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxPackage',
                'id' => 'tbxPackage',
                'value' => isset($item->Package) ? $item->Package : set_value('tbxPackage'),
            ));
            echo form_error(
                'tbxPackage',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group contactLens-WaterOfPercentage">
            <?php
            echo form_label('Water Of Percentage', 'tbxWaterOfPercentage');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxWaterOfPercentage',
                'id' => 'tbxWaterOfPercentage',
                'type' => 'number',
                'min' => '1',
                'value' => isset($item->WaterOfPercentage) ? $item->WaterOfPercentage : set_value('tbxWaterOfPercentage'),
            ));
            echo form_error(
                'tbxWaterOfPercentage',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group contactLens-LensPerBox">
            <?php
            echo form_label("Lens Per Boxes", 'tbxLensPerBox');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxLensPerBox',
                'id' => 'tbxLensPerBox',
                'type' => 'number',
                'min' => '1',
                'value' => isset($item->LensPerBox) ? $item->LensPerBox : set_value('tbxLensPerBox'),
            ));
            echo form_error(
                'tbxLensPerBox',
                '<small class="form-text text-danger">',
                '</small>'
            ); ?>
        </div>
        <div class="form-group contactLens-DIA">
            <?php
            echo form_label("DIA", 'tbxDIA');
            echo form_input(array(
                'class' => 'form-control',
                'name' => 'tbxDIA',
                'id' => 'tbxDIA',
                'type' => 'number',
                'value' => isset($item->DIA) ? $item->DIA : set_value('tbxDIA'),
            ));
            echo form_error(
                'tbxDIA',
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