<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StorageBoxes_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct('StorageBoxes', 'ProductId');
    }
}