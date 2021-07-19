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
		$options = array();
        $categories = $this->CategoriesTable->select();
        foreach ($categories as $c) {
            $options += array($c->Id => $c->Name);
        };
        $data['categories'] = $options;
		$this->templator->load('AdminLayout', 'admin/categories/add', $data);
	}

	public function create_post()
	{
		$payload = array(
//			'Id' => $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
			'ParentId' => $this->input->post('tbxParentId'),
//			'ParentId' => isset($this->input->post('tbxParentId')) ? $this->input->post('tbxParentId') : null,
		);

		$this->CategoriesTable->insert($payload);

		redirect('admin/categories-management');
	}

	public function edit_view(int $id)
	{
		$option1 = array();
        $categories1 = $this->CategoriesTable->select();
        foreach ($categories1 as $c) {
            $option1 += array($c->Id => $c->Id);
        };
		$data['categories1'] = $option1;

		$data['item'] = $this->CategoriesTable->selectOne(array(), "Id=$id");

		$this->templator->load('AdminLayout', 'admin/categories/edit', $data);
	}

	public function edit_post()
	{
		$payload = array(
//			'Id' => $this->input->post('tbxId'),
			'Name' => $this->input->post('tbxName'),
			'ParentId' => $this->input->post('tbxParentId'),
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
