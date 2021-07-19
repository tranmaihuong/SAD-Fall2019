<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_MessagesBoxController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('MessagesBox_model', 'MessagesBoxTable');
	}

	public function index()
	{
		$userIds = $this->input->get('between');
		$data = array(
			'histories' => $this->MessagesBoxTable->selectMessagesHistory(1),
			'chat' => isset($userIds)
				? $this->MessagesBoxTable->selectMessagesBetween($userIds)
				: array(),
		);
		$this->templator->load('AdminLayout', 'admin/MessagesBox', $data);
	}

	public function send_message()
	{
		$payload = array(
			'FromUserId' => $this->input->post('tbxFromUserId'),
			'ToUserId' => $this->input->post('tbxToUserId'),
			'Content' => $this->input->post('tbxContent'),
		);
		$this->MessagesBoxTable->insert($payload);
		redirect("admin/messages-box/?between[]={$payload['FromUserId']}&between[]={$payload['ToUserId']}");
	}
}
