<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_OrdersController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Order_model', 'OrdersTable');
		$this->load->model('OrderDetail_model', 'OrderDetailsTable');
		$this->load->model('User_model', 'UsersTable');
		$this->load->model('Product_model', 'ProductsTable');
	}

	public function index()
	{
		$UserId = $this->session->userdata('id');
		$data['allOrders'] = $this->OrdersTable->select(array(), "UserId = '$UserId'");

		$data2['OrderDetail'] = $this->OrderDetailsTable->select();

		$this->templator->load('UserLayout', 'user/orders/view', $data, $data2);
	}

	public function create_view(int $productId)
	{
		$data['detail'] = $this->ProductsTable->selectOne(array(), "Id='$productId'");

		$this->templator->load('UserLayout', 'user/orders/add', $data);
	}

	public function create_post()
	{

		$payload = array(
			'UserId' => $this->session->userdata('id'),
			'UserName' => $this->input->post('tbxUserName'),
			'PhoneNumber' => $this->input->post('tbxPhone'),
			'Address' => $this->input->post('tbxAddress'),
		);
		$this->OrdersTable->insert($payload);

		$OrderId = $this->OrdersTable->getLastId();
		$payload2 = array(
			'OrderId' => $OrderId,
			'ProductId' => $this->input->post('tbxProductId'),
			'Quantity' => $this->input->post('tbxQuantities')
		);
		$this->OrderDetailsTable->insert($payload2);

		$prod = $this->ProductsTable->selectOne(array(), "Id='" . $payload2['ProductId'] . "'");
		$price = $prod->Price * $payload2['Quantity'];

		$this->OrdersTable->update($OrderId, array('Price' => $price));

		redirect('orders/view');
	}

	public function cancel(int $id)
	{
		$this->OrdersTable->update($id, array(
			'Status' => 4
		));
		redirect('orders/view');
	}

}
