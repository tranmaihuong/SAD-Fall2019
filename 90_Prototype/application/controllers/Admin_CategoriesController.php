<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_CategoriesController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Category_model', 'CategoriesTable');
	}

	public function index()
	{
		$data['allCategories'] = $this->CategoriesTable->select();
		$this->templator->load('AdminLayout', 'admin/categories/view', $data);
	}

	public function create_view()
	{
		$this->templator->load('AdminLayout', 'admin/categories/add');
	}

	public function create_post()
	{
		$payload = array(
//			'Id' => $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
//			'ParentId' => isset($this->input->post('tbxParentId')) ? $this->input->post('tbxParentId') : null,
		);

		$this->CategoriesTable->insert($payload);

		redirect('admin/categories-management');
	}

	public function edit_view(int $id)
	{
		$data['item'] = $this->CategoriesTable->selectOne(array(), "Id=$id");
		$this->templator->load('AdminLayout', 'admin/categories/edit', $data);
	}

	public function edit_post()
	{
		$payload = array(
//			'Id' => $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
//			'ParentId' => isset($this->input->post('tbxParentId')) ? $this->input->post('tbxParentId') : null,
		);

		$this->CategoriesTable->update($this->input->post('tbxId'), $payload);

		redirect('admin/categories-management');
	}

	public function delete(int $id)
	{
		$this->CategoriesTable->delete($id);
		redirect('admin/categories-management');
	}
}
