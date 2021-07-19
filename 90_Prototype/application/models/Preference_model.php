<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preference_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Preferences', 'Key');
	}

	public function select(array $fields = array(), string $condition = '1=1')
	{
		$rows = parent::select($fields, $condition);
		$result = array();

		foreach ($rows as $row) {
			$result[$row->Key] = $row->Value;
		}

		return $result;
	}

	public function updateMany(array $keyValuePairs)
	{
		$affectedRows = 0;
		$errormsg = array();

		$this->db->trans_start();
		foreach ($keyValuePairs as $key => $value) {
			$sql = "UPDATE $this->tableName SET Value='$value' WHERE `Key`='$key'";
			$this->db->query($sql);
			$affectedRows += $this->db->affected_rows();
			$errormsg += $this->db->error();
		}
		$this->db->trans_complete();

		if (!$this->db->trans_status()) {
			$affectedRows = 0;
		}

		return (object)array(
			'affectedRows' => $affectedRows,
			'error' => $errormsg,
		);
	}
}
