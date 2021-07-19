<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_UsersController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model', 'UsersTable');
	}

	public function index()
	{
		$data['allUsers'] = $this->UsersTable->select();
		$this->templator->load('AdminLayout', 'admin/users/view', $data);
	}

	public function create_view()
	{
		$this->templator->load('AdminLayout', 'admin/users/add');
	}

	public function create_post()
	{
		$type1 = true;
		if ($this->input->post('tbxType') == '0') {
			$type1 = false;
		}
		$payload = array(
			// 'Id'=> $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
			'Email' => $this->input->post('tbxEmail'),
			'PhoneNumber' => $this->input->post('tbxPhone'),
			'Address' => $this->input->post('tbxAddress'),
			'Birthday' => $this->input->post('tbxBirthday'),
			'Password' => $this->input->post('tbxPassword'),
			'Type' => $type1,
		);

		$this->UsersTable->insert($payload);
		redirect('admin/users-management');
	}

	public function edit_view(int $id)
	{
		$data['item'] = $this->UsersTable->selectOne(array(), "Id=$id");
		$this->templator->load('AdminLayout', 'admin/users/edit', $data);
	}

	public function edit_post()
	{
		$type1 = true;
		if ($this->input->post('tbxType') == '0') {
			$type1 = false;
		}
		$payload = array(
			//			'Id' => $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
			'Email' => $this->input->post('tbxEmail'),
			'PhoneNumber' => $this->input->post('tbxPhone'),
			'Address' => $this->input->post('tbxAddress'),
			'Birthday' => $this->input->post('tbxBirthday'),
			'Password' => $this->input->post('tbxPassword'),
			'Type' => $type1,
		);
		// echo anchor($payload['Type']);

		$this->UsersTable->update($this->input->post('tbxId'), $payload);

		redirect('admin/users-management');
	}

	public function delete(int $id)
	{
		$this->UsersTable->delete($id);
		redirect('admin/users-management');
	}
}
