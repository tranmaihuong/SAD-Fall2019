<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<a href="<?= base_url('admin/categories-management/add') ?>" class="btn btn-sm btn-primary">Add</a>

<script>
	function doconfirm()
	{
		job=confirm('Are you sure to cancel this Category permanently?\n \ This action cannot be undone!');
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
			<th>ParentId</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allCategories as $row) : ?>
			<tr>
				<td><?= $row->Id ?></td>
				<td><?= $row->Name ?></td>
				<td><?= $row->ParentId ?></td>
				<td>
					<!-- <a role="button" href="<?= base_url("admin/categories-management/edit/$row->Id") ?>" class="btn btn-sm btn-secondary">Edit</a>
					<a role="button" href="<?= base_url("admin/categories-management/delete/$row->Id") ?>" class="btn btn-sm btn-danger">Delete</a> -->
				
				<a role="button"
				   href="<?= base_url("admin/categories-management/edit/$row->Id") ?>"
				   class="btn btn-sm btn-secondary">Edit</a>

				<a 	role="button" class="btn btn-sm btn-danger" 
					href="<?php echo site_url();?>/admin/categories-management/delete/<?php print($row->Id);?>"
					onClick="return doconfirm();">
					Delete
				</a>
				
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>