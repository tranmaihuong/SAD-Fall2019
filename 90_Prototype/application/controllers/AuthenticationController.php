<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthenticationController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library( 'encryption');
        $this->load->model('User_model', 'User_model');
        $this->load->library('session');
      
    }

    public function index()
    {
        $data['title'] = 'Login Form';
        $this->load->view('login', $data);
    }


    public function login_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            //true
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //model function
            $this->load->model('User_model');
            if ($this->User_model->canLogin($email, $password)) {
              $username=  $this->User_model->getUserName($email, $password);
              $type=  $this->User_model->getType($email, $password);
              $id=  $this->User_model->getId($email, $password);
                $session_data = array(
                'email' => $email,
                'username' => $username,
                 
                'type' => $type,
                'id'=>$id,
		);
        $this->session->set_userdata( $session_data);
        
                redirect('AuthenticationController/enter');
            }
             else {
                //false
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('AuthenticationController/index');
            }
        }else {
             $this->index();
        }}
    

    function enter()
    {
        if ($this->session->userdata('email') != '') {
            if ($this->session->userdata['type']==TRUE){   
            redirect('AuthenticationController/admin');}
            else {
                redirect('AuthenticationController/customer');}
        } else {
            redirect('AuthenticationController/index');
        }
    }
    function admin(){
     
        $this->templator->load('AdminLayout', 'admin/Home');
    }
    function customer(){
        // $data['title'] = 'Customer Page';
        $this->templator->load('UserLayout', 'user/Home');
    }
    public function register()
    {
        $data['title'] = 'Register Form';
        $this->load->view('register', $data);
    }

    function logout()
    {
        // $this->session->unset_userdata('email','username','type');
        // $this->session->unset_userdata();
        $this->session->sess_destroy();
        // session_destroy();
        redirect('AuthenticationController/index');
        
    }
    public function register_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'PhoneNumber', 'required');
        if ($this->form_validation->run()) {
            //true
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $birthday = $this->input->post('birthday');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            //model function
            $this->load->model('User_model');
            if ($this->User_model->canRegister($email)) {
                $this->User_model->addUser($username,$email, $password,$address,$birthday, $phone);
                $username=  $this->User_model->getUserName($email, $password);
              $type=  $this->User_model->getType($email, $password);
              $id=  $this->User_model->getID($email, $password);     
                $session_data = array(
                  'email'=>$email,
                  'username' => $username,
                    'type' => $type,
                    'id' =>$id,
                );
                $this->session->set_userdata($session_data);
                redirect('AuthenticationController/enter');}
             else {
                //false
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('AuthenticationController/register');
            }
            

        }else {
           
            $this->register();
           
          
        }}
}



