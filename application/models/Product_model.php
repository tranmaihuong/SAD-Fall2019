<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Products');
	}

	public function sumPrice(array $details)
	{
		$result = 0;
		$pIds = $details['productIds[]'];
		$qts = $details['quantities[]'];

		for ($i = 0; $i < sizeof($pIds); $i++) {
			$ent = $this->selectOne(array('Price'), "`Id`='$pIds[$i]'");
			$result += $qts[$i] * $ent->Price;
		}
		return $result;
	}

	public function delete($id)
    {
        $sql = "DELETE FROM Products WHERE Products.Id = $id";

        $this->db->query($sql);

        return (object) array(
            'affectedRows' => $this->db->affected_rows(),
            'error' => $this->db->error(),
        );
    }
}
