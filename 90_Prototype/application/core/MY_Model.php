<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Model
 * The base model class which provides reusable methods to interact with database.
 * For database configuration please see /application/config/database.php.
 *
 * @author tungpd
 */
class MY_Model extends CI_Model
{

	/**
	 * @var string
	 * The table name, take a look at database diagram or any of administrator tool.
	 */
	protected $tableName;

	/**
	 * @var string
	 * Primary key field name in the table
	 */
	protected $keyField;


	/**
	 * MY_Model constructor. Initiate the model with $tableName and $keyField if necessary.
	 *
	 * You can always override any methods to customize your queries in a different one.
	 *
	 * This constructor is not a must.
	 *
	 * @param string $tableName The table name, take a look at database diagram or any of administrator tool.
	 * @param string $keyField Primary key field name in the table, set to 'Id' by default.
	 * @example parent::__construct('Users', 'Id')
	 */
	public function __construct(string $tableName, string $keyField = 'Id')
	{
		parent::__construct();

		$this->load->helper('QueryStringBuilder');

		$this->tableName = $tableName;
		$this->keyField = $keyField;
	}


	/**
	 * Insert a record to the specified $tableName
	 *
	 * Example usage: insert(
	 *    array(
	 *        'Email' => 'tung.phamduc@hotmail.com',
	 *        'Name' => 'Tung Pham Duc'
	 *    )
	 * );
	 *
	 * @param array $keyValuePairs A dictionary with fields and the corresponding values.
	 * @return {
	 *    'affectedRows' => int,
	 *    'error' => string
	 * }
	 */
	public function insert(array $keyValuePairs)
	{
		if (is_array($keyValuePairs[0])) return $this->insertMany($keyValuePairs);

		$sql = "INSERT INTO `$this->tableName` ";
		$sql .= qsb_buildKeyStringForInsertQuery($keyValuePairs);
		$sql .= " VALUES ";
		$sql .= qsb_buildValueStringForInsertQuery($keyValuePairs);

		$this->db->query($sql);

		return (object)array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	/**
	 * Insert a number of records to the specified $tableName.
	 *
	 * Example usage: insert(
	 *    array(
	 *        array(
	 *            'Email' => 'tung.phamduc@hotmail.com',
	 *            'Name' => 'Tung Pham Duc'
	 *        ),
	 *        array(
	 *            'Email' => 'email@abc.com',
	 *            'Name' => 'Hello World'
	 *        )
	 *    )
	 * );
	 *
	 * @param array $rows An array of dictionaries with fields and the corresponding values.
	 * @return {
	 *    'affectedRows' => int,
	 *    'error' => string
	 * }
	 */
	public function insertMany(array $rows)
	{
		$sql = "INSERT INTO `$this->tableName` ";
		$sql .= qsb_buildKeyStringForInsertQuery($rows[0]);
		$sql .= " VALUES ";
		$valueStringArr = array();
		foreach ($rows as $row) {
			array_push($valueStringArr, qsb_buildValueStringForInsertQuery($row));
		}
		$sql .= implode(', ', $valueStringArr);

		$this->db->query($sql);

		return (object)array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	/**
	 * Select records from the specified $tableName.
	 *
	 * Example usage: select();
	 * => equals to SELECT *
	 *
	 * Example usage: select(array('Email', 'Name'));
	 * => equals to SELECT Email, Name
	 *
	 * Example usage: select(array('Email', 'Name'), '1=1');
	 * => equals to SELECT Email, Name FROM ... WHERE 1=1
	 *
	 * @param array $fields An array of fields that need to retrieve.
	 * @param string $condition Your extra condition, written in pure sql.
	 * @return array any[]
	 */
	public function select(array $fields = array(), string $condition = '1=1')
	{
		$fieldsList = qsb_buildFieldsList($fields);
		$sql = "SELECT $fieldsList
				FROM $this->tableName
				WHERE $condition";

		return $this->db->query($sql)->result();
	}

	/**
	 * Select one record from the specified $tableName.
	 * If multiple records found, return the first record.
	 *
	 * Example usage: select();
	 * => equals to SELECT *
	 *
	 * Example usage: select(array('Email', 'Name'));
	 * => equals to SELECT Email, Name
	 *
	 * Example usage: select(array('Email', 'Name'), '1=1');
	 * => equals to SELECT Email, Name FROM ... WHERE 1=1
	 *
	 * @param array $fields An array of fields that need to retrieve
	 * @param string $condition Your extra condition, written in pure sql
	 * @return object {}
	 */
	public function selectOne(array $fields = array(), string $condition = '1=1')
	{
		$fieldsList = qsb_buildFieldsList($fields);
		$sql = "SELECT $fieldsList
				FROM $this->tableName
				WHERE $condition";

		return $this->db->query($sql)->row();
	}

	/**
	 * Update a record from the specified $tableName
	 *
	 * Example usage: update(1, array(
	 *        'Email' => 'tung.phamduc@hotmail.com',
	 *        'Name' => 'Tung Pham Duc'
	 *    )
	 * );
	 *
	 * @param any $key Key of the record
	 * @param array $keyValuePairs
	 * @return {
	 *    'affectedRows' => int,
	 *    'error' => string
	 * }
	 */
	public function update($key, array $keyValuePairs)
	{
		$sql = "UPDATE $this->tableName SET ";
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

	/**
	 * Delete a record from the specified $tableName
	 *
	 * Example usage: delete(1);
	 *
	 * @param any $key Key of the record
	 * @return {
	 *    'affectedRows' => int,
	 *    'error' => string
	 * }
	 */
	public function delete($key)
	{
		$sql = "DELETE FROM $this->tableName WHERE $this->keyField = $key";

		$this->db->query($sql);

		return (object)array(
			'affectedRows' => $this->db->affected_rows(),
			'error' => $this->db->error(),
		);
	}

	public function getLastId()
	{
		$sql = "SELECT MAX(`$this->keyField`) as max_id FROM $this->tableName";
		return $this->db->query($sql)->row()->max_id;
	}
}
