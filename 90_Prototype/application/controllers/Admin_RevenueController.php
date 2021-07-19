<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_RevenueController extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Revenue_model');

    }

    public function index()
    {
		$this->templator->load('AdminLayout', 'admin/revenue/view');
    }
    public function create_post() {
        //Storing all  values travelled through POST method
        $data = array(
        'fromTime' => $this->input->post('fromTime'),
            'toTime' => $this->input->post('toTime'),
            'filter' => $this->input->post('filter'));
              //model function
            
              $this->load->model('Revenue_model');
            //send stored values to the revenue.php page           '
            if ($data['filter']=='Annual'){
               $revenue=  $this->Revenue_model->annualRevenue( $data['fromTime'],  $data['toTime']);
              
               $dataNew['revenue'] = $revenue;
               $this->templator->load('AdminLayout', 'admin/revenue/tableAnnual', $dataNew);
      
            }
              
            else {
                $revenue=  $this->Revenue_model->monthlyRevenue( $data['fromTime'],  $data['toTime']);
              
                $dataNew['revenue'] = $revenue;
                $this->templator->load('AdminLayout', 'admin/revenue/tableMonthly', $dataNew);}
            

    }



    }
    ?>
    