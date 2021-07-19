<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-block mb-3 float-right">
	<a href="<?= base_url('admin/orders-management/add'); ?>"
	   class="btn btn-sm btn-primary">Add</a>
</div>
<table class="table table-hover">
	<thead>
	<th>Id</th>
	<th>UserName</th>
	<th>Address</th>
	<th>PhoneNumber</th>
	<th>Status</th>
	<th>CreatedDate</th>
	<th></th>
	</thead>
	<tbody>
	<?php foreach ($allOrders as $row): ?>
		<tr>
			<td><?= $row->Id ?></td>
			<td><?= $row->UserName ?></td>
			<td><?= $row->Address ?></td>
			<td><?= $row->PhoneNumber ?></td>
			<td><?= $row->Status ?></td>
			<td><?= $row->CreatedDate ?></td>
			<td>
				<a role="button"
				   href="<?= base_url("admin/orders-management/$row->Id/details") ?>"
				   class="btn btn-sm btn-secondary">Edit</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
