<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Users');
	}

	function canLogin($email, $password)
	{
		$sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
		$user = $this->db->query($sql);
		if ($user->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function canRegister($email)
	{
		$sql = "SELECT * FROM Users WHERE Email='$email'";
		$user = $this->db->query($sql);
		if ($user->num_rows() == 0) {
			return true;
		} else {
			return false;
		}
	}

	function addUser($username, $email, $password, $address, $birthday, $phone)
	{
		$sql = "INSERT INTO Users(Name,Email, Password, Address, Birthday, PhoneNumber) 
    			VALUES ('$username', '$email', '$password','$address','$birthday', '$phone');";
		$user = $this->db->query($sql);
	}

	function getUserName($email, $password)
	{
		$sql = "SELECT Name FROM Users WHERE Email='$email' AND Password='$password'";
		$data = $this->db->query($sql)->row();
		return $data->Name;
	}


	function getEmail($email, $password)
	{
		$sql = "SELECT Email FROM Users WHERE Email='$email' AND Password='$password'";
		$data = $this->db->query($sql)->row();
		return $data->Email;
	}

	function getType($email, $password)
	{
		$sql = "SELECT Type FROM Users WHERE Email='$email' AND Password='$password'";
		$data = $this->db->query($sql)->row();
		return $data->Type;
	}

	function getID($email, $password)
	{
		$sql = "SELECT Id FROM Users WHERE Email='$email' AND Password='$password'";
		$data = $this->db->query($sql)->row();
		return $data->Id;
	}
}
