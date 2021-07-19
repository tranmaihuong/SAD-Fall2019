<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sprays_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('Sprays', 'ProductId');
	}
}
