<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
	function doconfirm()
	{
		job=confirm("Are you sure to cancel your Order permanently?\n \ This action cannot be undone!");
		if(job!=true)
		{
			return false;
		}
	}
</script>

<table class="table table-hover">
	<thead>
	<th>OrderId</th>
	<th>UserName</th>
	<th>Address</th>
	<th>PhoneNumber</th>
	<th>Status</th>
	<th>CreatedDate</th>
	<th>Price</th>
	<th></th>
	</thead>
	<tbody>
	<?php foreach ($allOrders as $row): ?>
		<tr>
			<td><?= $row->Id ?></td>
			<td><?= $row->UserName ?></td>
			<td><?= $row->Address ?></td>
			<td><?= $row->PhoneNumber ?></td>
			<td>
			<?php
			switch ($row->Status) {
				case 4:
					echo 'Canceled';
					break;
				case 0:
					echo 'Pedding';
					break;
				case 1:
					echo 'Shipping';
					break;
				case 2:
					echo 'Completed';
					break;
				case 3:
					echo 'Failed';
					break;
			}			
			 ?>
			</td>
			<td><?= $row->CreatedDate ?></td>
			<td><?= $row->Price ?></td>
			<td>
				<!-- <a role="button"
				   href="<?= base_url("orders/$row->Id/details") ?>"
				   class="btn btn-sm btn-secondary">Edit</a> -->
			</td>
			<td>
				<a 	role="button" class="btn btn-sm btn-danger" 
					href="<?php echo site_url();?>/orders/cancel/<?php print($row->Id);?>"
					onClick="return doconfirm();">
					Cancel
				</a>

				<!-- <a role="button"
				   href="<?= base_url("/orders/cancel/$row->Id") ?>"
				   class="btn btn-sm btn-danger">cancel</a> -->
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
