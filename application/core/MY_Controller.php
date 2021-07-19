<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	private $statusCode;

	public function __construct()
	{
		parent::__construct();

		$this->statusCode = 200;

		$userId = $this->session->id;
		$userRole = $this->session->type;

		if (!isset($userId) || !isset($userRole)) {
			redirect('/login');
			return;
		}

		if ($this->uri->segment(1) == 'admin') {
			if (!$userRole) {
				redirect('/login');
				return;
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
