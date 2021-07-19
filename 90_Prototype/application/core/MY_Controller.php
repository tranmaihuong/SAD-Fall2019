<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	private $statusCode;

	public function __construct()
	{
		parent::__construct();

		$this->statusCode = 200;

		if ($this->uri->segment(1) == 'admin') {
			$userId = $this->session->id;
			$userRole = $this->session->type;

			if (empty($userId) || empty($userRole) || $userRole == false) {
				redirect('/login');
			}
		}
	}


	protected function json(array $data, string $msg = 'Request success')
	{
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_status_header($this->statusCode)
			->set_output(json_encode(array(
				'statusCode' => $this->statusCode,
				'message' => $msg,
				'payload' => $data
			)));
	}

	protected function status(int $code)
	{
		$this->statusCode = $code;
		return $this;
	}

	protected function getRequestBody()
	{
		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		return json_decode(trim($stream), true);
	}
}
