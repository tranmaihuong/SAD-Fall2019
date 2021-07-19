<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$username = ($this->session->userdata['username']);
?>
<!DOCTYPE HTML>

<html lang="en">

<head>
	<meta charset="utf-8">

	<title><?= $pref['siteTitle'] ?></title>
	<meta name="author"
		  content="Group 2">

	<link rel="stylesheet"
		  href="<?= base_url('vendor/bootstrap431/css/bootstrap.min.css') ?>">
	<link rel="stylesheet"
		  href="<?= base_url('vendor/custom.css') ?>">
	<script src="<?= base_url('vendor/jquery-3.4.1.min.js') ?>"></script>
	<script src="<?= base_url('vendor/custom.js') ?>"></script>
</head>

<body>
<div class="container-fluid row">
	<section id="sidebar"
			 class="col-3">
		<ul class="nav flex-column py-3">
			<li class="nav-item text-center">
				<img src="https://via.placeholder.com/150"/>
				<p class="text-dark"><?php
					echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>"; ?></p>
			</li>
			<li class="nav-item text-center">
				<a class="nav-link"
				   href="<?= base_url('log-out') ?>">Log out</a>
			</li>

			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin') ?>">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/categories-management') ?>">Categories Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/brands-management') ?>">Brands Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/glasses-management') ?>">Glasses Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/contactlens-management') ?>">Contact Lens</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/clothes-management') ?>">Cleaner: Clothes Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/sprays-management') ?>">Cleaner: Sprays Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/boxes-management') ?>">Storage Boxes Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/users-management') ?>">Users Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/orders-management') ?>">Orders Management</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/preferences') ?>">Website Preferences</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/revenue') ?>">Revenue Statistics</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('admin/messages-box') ?>">Customer Care</a>
			</li>
		</ul>
	</section>
	<section id="mainContent"
			 class="col-9">
		<main class="container py-5">
			<?= $content ?>
		</main>
	</section>
</div>
</body>

</html>
