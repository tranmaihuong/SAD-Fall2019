<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_PreferencesController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Preference_model', 'PreferencesTable');
	}

	public function index()
	{
		$data['pref'] = (object)$this->PreferencesTable->select();
		$this->templator->load('AdminLayout', 'admin/Preferences.php', $data);
	}

	public function save()
	{
		$payload = array(
			'siteTitle' => $this->input->post('tbxTitle'),
			'phoneNumber' => $this->input->post('tbxPhoneNumber'),
			'email' => $this->input->post('tbxEmail'),
			'address' => $this->input->post('tbxAddress'),
			'facebookUrl' => $this->input->post('tbxFaceBookUrl'),
			'instagramUrl' => $this->input->post('tbxInstagramUrl'),
			'twitterUrl' => $this->input->post('tbxTwitterUrl'),
			'isEmailConfirmationRequired' => $this->input->post('slEmailConfirmation'),
			'isCaptchaEnabled' => $this->input->post('slCaptcha'),
		);

		$dbResponse = $this->PreferencesTable->updateMany($payload);
		if ($dbResponse->affectedRows == 0) {
			$this->form_validation->set_message('db_err', $dbResponse->error);
			$this->templator->load('AdminLayout', 'admin/Preferences.php');
			return;
		}

		redirect('admin/preferences');
	}
}
