<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_HomeController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->templator->load('AdminLayout', 'admin/Home');
	}
}
