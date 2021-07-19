<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Revenue_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Orders');
	}

	function monthlyRevenue($fromTime, $toTime)
	{

		$sql = "SELECT MONTH(o.CreatedDate) AS MONTH, SUM(Price)AS REVENUE

		from Orders AS O WHERE o.Status= 3
					 AND o.CreatedDate
		
		 BETWEEN '$fromTime' AND '$toTime' ";

		return $this->db->query($sql)->result();
	}
	function annualRevenue($fromTime, $toTime)
	{

		$sql = "SELECT YEAR(o.CreatedDate) AS YEAR, SUM(Price)AS REVENUE

		from Orders AS O WHERE o.Status= 3
					 AND o.CreatedDate
		
					 BETWEEN '$fromTime' AND '$toTime'
		";
		return $this->db->query($sql)->result();
	}
}
