<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_BrandsController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Brand_model', 'BrandsTable');
	}

	public function index()
	{
		$data['allBrands'] = $this->BrandsTable->select();
		$this->templator->load('AdminLayout', 'admin/brands/view', $data);
	}

	public function create_view()
	{
		$this->templator->load('AdminLayout', 'admin/brands/add');
	}

	public function create_post()
	{
		$this->form_validation->set_rules('tbxName', 'Brand name', 'required');

		if (!$this->form_validation->run()) {
			$this->templator->load('AdminLayout', 'admin/brands/add');
			return;
		}
		$payload = array(
			'Name' => $this->input->post('tbxName')
		);

		$dbResponse = $this->BrandsTable->insert($payload);
		if ($dbResponse->affectedRows == 0) {
			$this->form_validation->set_message('db_err', $dbResponse->error);
			$this->templator->load('AdminLayout', 'admin/brands/add');
			return;
		}

		redirect('admin/brands-management');
	}

	public function edit_view(int $id)
	{
		$data['item'] = $this->BrandsTable->selectOne(array(), "`Id`='$id'");
		$this->templator->load('AdminLayout', 'admin/brands/edit', $data);
	}

	public function edit_post()
	{
		$this->form_validation->set_rules('tbxName', 'Brand name', 'required');

		if (!$this->form_validation->run()) {
			$this->templator->load('AdminLayout', 'admin/brands/edit');
			return;
		}
		$payload = array(
			'Name' => $this->input->post('tbxName')
		);

		$dbResponse = $this->BrandsTable->update(
			$this->input->post('tbxId'),
			$payload
		);
		if ($dbResponse->affectedRows == 0) {
			$this->form_validation->set_message('db_err', $dbResponse->error);
			$this->templator->load('AdminLayout', 'admin/brands/edit');
			return;
		}

		redirect('admin/brands-management/edit/' . $this->input->post('tbxId'));
	}

	public function delete(int $id)
    {
        $this->BrandsTable->delete($id);
        redirect('admin/brands-management');
    }
}
