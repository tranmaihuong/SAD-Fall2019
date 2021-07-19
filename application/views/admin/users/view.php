<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<a href="<?= base_url('admin/users-management/add') ?>"
   class="btn btn-sm btn-primary">Add</a>

<script>
	function doconfirm()
	{
		job=confirm("Are you sure to delete this User permanently?\n \ This action cannot be undone!");
		if(job!=true)
		{
			return false;
		}
	}
</script>


<table class="table">
	<thead>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>PhoneNumber</th>
		<th>Address</th>
		<th>Birthday</th>
		<th>Password</th>
		<th>Type</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($allUsers as $row): ?>
		<tr>
			<td><?= $row->Id ?></td>
			<td><?= $row->Name ?></td>
			<td><?= $row->Email ?></td>
			<td><?= $row->PhoneNumber ?></td>
			<td><?= $row->Address ?></td>
			<td><?= $row->Birthday ?></td>
			<td><?= $row->Password ?></td>
			<td><?= $row->Type ?></td>
			<td>
				<a role="button"
				   href="<?= base_url("admin/users-management/edit/$row->Id") ?>"
				   class="btn btn-sm btn-secondary">Edit</a>
				<!-- <a role="button"
				   href="<?= base_url("admin/users-management/delete/$row->Id") ?>"
				   class="btn btn-sm btn-danger">Delete</a> -->


				<a 	role="button" class="btn btn-sm btn-danger" 
					href="<?php echo site_url();?>/admin/users-management/delete/<?php print($row->Id);?>"
					onClick="return doconfirm();">
					Delete
				</a>
				
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>

</table>
