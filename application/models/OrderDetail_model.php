<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderDetail_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('OrderDetails');
	}

	public function customInsert(int $orderId, array $details)
	{
		$ents = array();
		$pIds = $details['productIds[]'];
		$qts = $details['quantities[]'];
		for ($i = 0; $i < sizeof($pIds); $i++) {
			$ents += array(
				'OrderId' => $orderId,
				'ProductId' => $pIds[$i],
				'Quantity' => $qts[$i],
			);
		}

		return $this->insert($ents);
	}
}
