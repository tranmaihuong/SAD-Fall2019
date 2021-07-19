<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<table class="table table-borderless">
	<tr>
		<td>Email:</td>
		<td>
			<a href="mailto:<?= $pref['email'] ?>"><?= $pref['email'] ?></a>
		</td>
	</tr>
	<tr>
		<td>Phone Number:</td>
		<td><?= $pref['phoneNumber'] ?></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><?= $pref['address'] ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="https://facebook.com/<?= $pref['facebookUrl'] ?>">fb</a>
			<a href="https://instagram.com/<?= $pref['instagramUrl'] ?>">insta</a>
			<a href="https://twitter.com/<?= $pref['twitterUrl'] ?>">twitter</a>
		</td>
	</tr>
</table>

<div id="map"
	 style="height: 500px"></div>

<script>
let map;

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {
			lat: <?= $pref['locationLatitude'] ?>,
			lng: <?= $pref['locationLongitude'] ?>
		},
		zoom: 8
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx8xkKKgWF9pX0zRclof8kOCq65gC9loU&callback=initMap"
		async
		defer></script>


