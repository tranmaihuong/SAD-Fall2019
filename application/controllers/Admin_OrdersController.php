<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_OrdersController extends MY_Controller
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
		$data['allOrders'] = $this->OrdersTable->select();
		$this->templator->load('AdminLayout', 'admin/orders/view', $data);
	}

	public function create_view()
	{
		$usersList = $this->UsersTable->select(array('Id', 'Name', 'Email'));
		$productsList = $this->ProductsTable->select(array('Id', 'Name', 'Price'));

		$userOptions = array(null => '-- Select an existing user');
		foreach ($usersList as $p) {
			$userOptions += array($p->Id => $p->Email);
		}

		$productOptions = array(null => '-- Select a product');
		foreach ($productsList as $p) {
			$productOptions += array($p->Id => $p->Name);
		}

		$data = array(
			'userOpts' => $userOptions,
			'usersList' => $usersList,
			'productOpts' => $productOptions,
			'productsList' => $productsList,
			'orderStatus' => array(
				0 => 'Pending',
				1 => 'Shipping',
				2 => 'Completed',
				3 => 'Failed',
				4 => 'Rescinded',
			),
		);

		$this->templator->load('AdminLayout', 'admin/orders/add', $data);
	}

	public function create_post()
	{
		$payload = array(
			'info' => array(
				'UserId' => $this->input->post('slUserId'),
				'UserName' => $this->input->post('tbxUserName'),
				'PhoneNumber' => $this->input->post('tbxPhoneNumber'),
				'Address' => $this->input->post('tbxAddress'),
				'Notes' => $this->input->post('tbxNotes'),
				'Status' => $this->input->post('tbxStatus'),
			),
			'details' => array(
				'productIds[]' => $this->input->post('slProductIds[]'),
				'quantities[]' => $this->input->post('tbxQuantities[]'),
			)
		);

		$payload['info']['Price'] = $this->ProductsTable->sumPrice($payload['details']);

		$this->db->trans_start();

		$this->OrdersTable->insert($payload['info']);

		$orderId = $this->OrdersTable->getLastId();
		$this->OrderDetailsTable->customInsert($orderId, $payload['details']);

		$this->db->trans_complete();

		if (!$this->db->trans_status()) {
			$this->templator->load('AdminLayout', 'admin/orders/add');
			return;
		}

		redirect('admin/orders-management');
	}

	public function edit_view(int $id)
	{
		$order = $this->OrdersTable->selectOne(array(), "`Id`=$id");
		$products = $this->OrdersTable->selectDetails($id);

		$data = array(
			'item' => $order,
			'user' => isset($order->UserId)
				? $this->UsersTable->selectOne(array(), "`Id`=$order->UserId")
				: null,
			'products' => $products,
			'orderStatus' => array(
				0 => 'Pending',
				1 => 'Shipping',
				2 => 'Completed',
				3 => 'Failed',
				4 => 'Rescinded',
			),
		);
		$this->templator->load('AdminLayout', 'admin/orders/details', $data);
	}

	public function edit_save(int $id)
	{
		$payload = array(
			'Status' => $this->input->post('slStatus'),
		);

		$dbResponse = $this->OrdersTable->update($id, $payload);

		if ($dbResponse->affectedRows == 0) {
			$this->form_validation->set_message('db_err', $dbResponse->error);
			$this->templator->load('AdminLayout', 'admin/orders/details');
			return;
		}

		redirect("admin/orders-management");
	}
}
