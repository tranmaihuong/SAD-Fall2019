<?php
defined('BASEPATH') or exit('No direct script access allowed');

$username = isset($this->session->username) ? $this->session->username : 'Guest';
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
	<script src="<?= base_url('vendor/bootstrap431/js/	bootstrap.bundle.js') ?>"></script>
	<script src="<?= base_url('vendor/custom.js') ?>"></script>
</head>

<body>
<div class="container-fluid row">
	<section id="sidebar"
			 class="col-3">
		<ul class="nav flex-column py-3">
			<li class="nav-item text-center">
				<?php if ($username != 'Guest'): ?>
					<img src="https://via.placeholder.com/150"/>
				<?php endif; ?>
				<p class="text-dark"><?php
					echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>"; ?></p>
			</li>
			<li class="nav-item text-center">
				<a class="nav-link"
				   href="<?= base_url('log-out') ?>">Log out</a>
			</li>

			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('contact-us') ?>">Contact Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('orders/view') ?>">Your Orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('messages-box') ?>">Messages box</a>
			</li>
		</ul>
	</section>
	<section id="mainContent"
			 class="col-9">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<button class="navbar-toggler"
					type="button"
					data-toggle="collapse"
					data-target="#navbarNavDropdown"
					aria-controls="navbarNavDropdown"
					aria-expanded="false"
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse"
				 id="navbarNavDropdown">
				<ul class="navbar-nav">
					<?php foreach ($categories as $c): ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle"
							   href="javascript:void(0);"
							   id="dropdown<?= $c->Id ?>"
							   role="button"
							   data-toggle="dropdown"
							   aria-haspopup="true"
							   aria-expanded="false">
								<?= $c->Name ?>
							</a>
							<div class="dropdown-menu"
								 aria-labelledby="dropdown<?= $c->Id ?>">
								<?php foreach ($brands as $b): ?>
									<a class="dropdown-item"
									   href="<?= base_url("products/?categoryId=$c->Id&brandId=$b->Id") ?>">
										<?= $b->Name ?></a>
								<?php endforeach; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</nav>
		<main class="container py-5">
			<?= $content ?>
		</main>
	</section>
</div>
</body>

</html>
