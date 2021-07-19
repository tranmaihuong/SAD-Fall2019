<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="d-block mb-3 float-right">
    <a href="<?= base_url('admin/sprays-management/add') ?>" class="btn btn-sm btn-primary">Add</a>
</div>

<table class="table">
    <thead>
        <th>ProductId</th>
        <th>Type</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($allSprays as $row) : ?>
            <tr>
                <td><?= $row->ProductId ?></td>
                <td><?= $row->Type ?></td>
                <td>
                    <a role="button" href="<?= base_url("admin/sprays-management/edit/$row->ProductId") ?>" class="btn btn-sm btn-secondary">Edit</a>
                    <a role="button" href="<?= base_url("admin/sprays-management/delete/$row->ProductId") ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
