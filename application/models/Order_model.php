<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Orders');
	}

	public function selectDetails($id)
	{
		$sql = "SELECT P.Name, OD.Quantity, P.Price
				FROM OrderDetails OD
					JOIN Products P ON OD.ProductId = P.Id
				WHERE OD.OrderId = $id";
		return $this->db->query($sql)->result();
	}
}
