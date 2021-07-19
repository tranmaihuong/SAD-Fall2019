<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_HomeController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->templator->load('UserLayout', 'user/Home');
	}

	public function contactPage()
	{
		$this->load->model('Preference_model', 'PreferencesTable');
		$data['pref'] = $this->PreferencesTable->select();
		$this->templator->load('UserLayout', 'user/ContactUs', $data);
	}

	public function messagesBox()
	{
		$this->load->model('MessagesBox_model', 'MessagesBoxTable');
		$data['chat'] = $this->MessagesBoxTable->selectMessagesBetween(array($this->session->id, 1));
		$this->templator->load('UserLayout', 'user/MessagesBox', $data);
	}

	public function messagesBox_send()
	{
		$this->load->model('MessagesBox_model', 'MessagesBoxTable');
		$payload = array(
			'FromUserId' => $this->input->post('tbxFromUserId'),
			'ToUserId' => $this->input->post('tbxToUserId'),
			'Content' => $this->input->post('tbxContent'),
		);
		$this->MessagesBoxTable->insert($payload);
		redirect("messages-box");
	}
}
