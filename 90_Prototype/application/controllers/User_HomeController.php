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
}
