<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Glasses_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct('Glasses', 'ProductId');
    }

    public function customSelect()
    {
        $sql = "SELECT P.Name, P.Price FROM Glasses G
				JOIN Products P ON G.ProductId = P.Id
		";

        return $this->db->query($sql)->result();
    }

    public function customSelectOne(int $id)
    {
        $sql = "SELECT FROM Glasses G
				JOIN Products P ON G.ProductId = P.Id
				JOIN Brand B on B.Id = P.BrandId
				WHERE G.ProductId = $id
		";

        return $this->db->query($sql)->row();
    }

    public function customUpdate($key, array $keyValuePairs)
	{
		$sql = "UPDATE $this->ProductsTable SET ";
		$sql .= implode(', ', array_map(
			function ($value, $key) {
				return "$key = '$value'";
			},
			$keyValuePairs,
			array_keys($keyValuePairs)
		));
		$sql .= " WHERE `$this->keyField` = '$key'";

		$this->db->query($sql);

		return (object)array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}
}
