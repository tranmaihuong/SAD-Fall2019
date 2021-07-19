<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ClothesController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Cloth_model', 'ClothesTable');
        $this->load->model('Brand_model', 'BrandsTable');
    }

    public function index()
    {
        
        $data['allClothes'] = $this->ClothesTable->select();
        $this->templator->load('AdminLayout', 'admin/clothes/view', $data);
    }

    public function create_view()
    {
        $this->templator->load('AdminLayout', 'admin/clothes/add');
    }

    public function create_post()
    {
        $payload = array(
//			'ProductId' => $this->input->post('tbxId'),
            'Material' => $this->input->post('tbxMaterial'),
            'Color' => $this->input->post('tbxColor'),
        );

        $this->ClothesTable->insert($payload);

        redirect('admin/clothes-management');
    }

    public function edit_view(int $id)
    {
        $data['item'] = $this->ClothesTable->selectOne(array(), "Id=$id");
        $this->templator->load('AdminLayout', 'admin/clothes/edit', $data);
    }

    public function edit_post()
    {
        $payload = array( 
//			'ProductId' => $this->input->post('tbxId'),
            'Material' => $this->input->post('tbxMaterial'),
            'Color' => $this->input->post('tbxColor'),
        );

        $this->ClothesTable->update($this->input->post('tbxId'), $payload);

        redirect('admin/clothes-management');
    }

    public function delete(int $id)
    {
        $this->ClothesTable->delete($id);
        redirect('admin/clothes-management');
    }
}
