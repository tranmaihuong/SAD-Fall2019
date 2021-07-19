<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="d-block mb-3 float-right">
    <a href="<?= base_url('admin/contactlens-management/add'); ?>" class="btn btn-sm btn-primary">Add</a>
</div>
<table class="table table-hover">
    <thead>
        <th>ProductId</th>
        <th>Package</th>
        <th>%Water</th>
        <th>Lens per Boxes</th>
        <th>DIA</th>
        <th></th>
        <!-- <th></th> -->
    </thead>
    <tbody>
        <?php foreach ($contactLens as $row) : ?>
            <tr>
                <td><?= $row->ProductId; ?></td>
                <td><?= $row->Package; ?></td>
                <td><?= $row->WaterOfPercentage; ?></td>
                <td><?= $row->LensPerBox; ?></td>
                <td><?= $row->DIA; ?></td>
                <td><a role="button" href="<?= base_url("admin/contactlens-management/edit/$row->ProductId") ?>" class="btn btn-sm btn-secondary">Edit</a>
                <a role="button" href="<?= base_url("admin/contactlens-management/delete/$row->ProductId") ?>" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>