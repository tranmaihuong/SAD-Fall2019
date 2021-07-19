<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateHandler
{
	var $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function load($layoutFile, $viewFileName = null, $data = null)
	{
		if (!is_null($viewFileName)) {
			if (file_exists(APPPATH . "views/$layoutFile/$viewFileName")) {
				$viewPath = "$layoutFile/$viewFileName";
			} else if (file_exists(APPPATH . "views/$layoutFile/$viewFileName.php")) {
				$viewPath = "$layoutFile/$viewFileName.php";
			} else if (file_exists(APPPATH . "views/$viewFileName")) {
				$viewPath = $viewFileName;
			} else if (file_exists(APPPATH . "views/$viewFileName.php")) {
				$viewPath = "$viewFileName.php";
			} else {
				show_error("Unable to load the requested file: $layoutFile/$viewFileName.php");
			}

			$content = $this->ci->load->view($viewPath, $data, TRUE);

			if (is_null($data)) {
				$data = array('content' => $content);
			} else if (is_array($data)) {
				$data['content'] = $content;
			} else if (is_object($data)) {
				$data->content = $content;
			}
		}

		$this->ci->load->view('layout/' . $layoutFile, $data);
	}
}
