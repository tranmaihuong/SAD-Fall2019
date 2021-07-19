<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



	<?php foreach ($allProducts as $row): ?>
		<tr>
			
			<td>
				<a role="button"
				   href="<?= base_url("user/product/detail/$row->Id") ?>"
				   class="btn btn-default"><?=  $row->Name ?></td></a>
				
			</td>
		</tr>
	<?php endforeach; ?>