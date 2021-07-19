<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="d-block mb-3 float-right">
    <a href="<?= base_url('admin/glasses-management/add'); ?>" class="btn btn-sm btn-primary">Add</a>
</div>
<table class="table table-hover">
    <thead>
        <th>Id</th>
        <!-- <th>Category</th>
        <th>Brand</th>
        <th>Name</th>
        <th>Price</th> -->
        <th>Shape</th>
        <th>Material</th>
        <th>Gender</th>
        <th>LensWidth</th>
        <th>ArmLength</th>
        <th>BridgeWidth</th>
        <th>LensHeight</th>
        <th>LensWidth</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($glasses as $row) : ?>
            <tr>
                <td><?= $row->ProductId; ?></td>
                <td><?= $row->Shape; ?></td>
                <td><?= $row->Material; ?></td>
                <td><?= $row->Gender; ?></td>
                <td><?= $row->LensWidth; ?></td>
                <td><?= $row->ArmLength; ?></td>
                <td><?= $row->BridgeWidth; ?></td>
                <td><?= $row->LensHeight; ?></td>
                <td><?= $row->LensWidthWithoutFrame; ?></td>
                <td><a role="button" href="<?= base_url("admin/glasses-management/edit/$row->ProductId") ?>" class="btn btn-sm btn-secondary">Edit</a></td>
                <td><a role="button" href="<?= base_url("admin/glasses-management/delete/$row->ProductId") ?>" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>