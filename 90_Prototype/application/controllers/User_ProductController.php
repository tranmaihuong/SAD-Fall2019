<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_ProductController extends MY_Controller
{



	public function __construct()
	{
		parent::__construct();

		$this->load->model('Product_model', 'ProductTable');
		$this->load->model('Comment_model', 'CommentTable');
	}

	public function index()
	{
		$data['allProducts'] = $this->ProductTable->select();

		$this->templator->load('UserLayout', 'user/product/view', $data);
	}

	public function detail(int $id)
	{
		$detail['item'] = $this->ProductTable->selectOne(array(), "Id=$id");
		$detail['allComments'] = $this->CommentTable->select(array(), "ProductId=$id");
		$this->templator->load('UserLayout', 'user/product/detail', $detail);
	}

	public function save()
	{

		$payload = array(
			'ProductId' => $this->input->post('tbxId'),
			'UserName' => $this->input->post('tbxName'),
			'Content' => htmlentities($this->input->post('tbxContent'), ENT_QUOTES),
		);
		$this->CommentTable->insert($payload);
		redirect('user/product/detail/' . $this->input->post('tbxId'));
	}
}
