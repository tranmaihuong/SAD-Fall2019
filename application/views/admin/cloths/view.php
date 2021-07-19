<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="d-block mb-3 float-right">
    <a href="<?= base_url('admin/clothes-management/add'); ?>" class="btn btn-sm btn-primary">Add</a>
</div>
<table class="table table-hover">
    <thead>
        <th>ProductId</th>
        <th>Material</th>
        <th>Color</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($cloths as $row) : ?>
            <tr>
                <td><?= $row->ProductId; ?></td>
                <td><?= $row->Material; ?></td>
                <td><?= $row->Color; ?></td>
                <td><a role="button" href="<?= base_url("admin/clothes-management/edit/$row->ProductId") ?>" class="btn btn-sm btn-secondary">Edit</a></td>
                <td><a role="button" href="<?= base_url("admin/clothes-management/delete/$row->ProductId") ?>" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>