<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_SpraysController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sprays_model', 'SpraysTable');
        $this->load->model('Brand_Model', 'BrandTable');
    }
    public function index()
    {
        $data['allSprays'] = $this->SpraysTable->select();
        $this->templator->load('AdminLayout', 'admin/sprays/view', $data);
    }
    public function create_view()
    {   
        $options = array();
        $brands = $this->BrandTable->select();
        foreach ($brands as $b) {
            $options += array($b->Id => $b->Name);
        };
        $data['brands'] = $options;
        $this->templator->load('AdminLayout', 'admin/sprays/add',$data);
    }











    

    public function create_post()
    {
        $payload = array(
//          'ProductId' => $this->input->post('tbxID'),
            'Type' => $this->input->post('tbxType'),
        );

        $this->SpraysTable->insert($payload);
        redirect('admin/sprays-management');
    }













    public function edit_view(int $id)
    {
        $data['item'] = $this->SpraysTable->selectOne(array(), "Id=$id");
        $this->templator->load('AdminLayout', 'admin/Sprays/edit', $data);
    }

    public function edit_post()
    {
        $payload = array(
//			'ProductId' => $this->input->post('tbxId'),
            'Type' => $this->input->post('tbxType'),
            );

        $this->SpraysTable->update($this->input->post('tbxId'), $payload);

        redirect('admin/sprays-management');
    }

    public function delete(int $id)
    {
        $this->SpraysTable->delete($id);
        redirect('admin/sprays-management');
    }
}
