<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
	<?php foreach ($items as $item): ?>
		<a href="<?= base_url("products/$item->Id") ?>"
		   class="col-4 d-block text-dark">
			<img src="https://via.placeholder.com/150"
				 class="img-fluid w-100"/>
			<div>
				<span class="float-left"><?= $item->Name ?></span>
				<span class="float-right"><?= $item->Price ?></span>
			</div>
		</a>
	<?php endforeach; ?>
</div>
