<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ClothesController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cloths_model', 'ClothsTable');
        $this->load->model('Brand_model', 'BrandTable');
        $this->load->model('Category_model', 'CategoryTable');
        $this->load->model('Product_model', 'ProductsTable');
    }

    public function index()
    {
        $data['cloths'] = $this->ClothsTable->select();
        $this->templator->load('AdminLayout', 'admin/cloths/view', $data);
    }

    public function create_view()
    {
        $options = array();
        $brands = $this->BrandTable->select();
        foreach ($brands as $b) {
            $options += array($b->Id => $b->Name);
        };
        $data['brands'] = $options;

        $options = array();
        $categories = $this->CategoryTable->select();
        foreach ($categories as $c) {
            $options += array($c->Id => $c->Name);
        };
        $data['categories'] = $options;
        $this->templator->load('AdminLayout', 'admin/cloths/add', $data);
    }

    public function create_post()
    {
        // $this->form_validation->set_rules('tbxName', 'Cloths name', 'required');

        // if ($this->form_validation->run()) {
        //     $this->templator->load('AdminLayout', 'admin/cloths/add');
        //     return;
        // }

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        // $dbResponseProducts = 
        $this->ProductsTable->insert($payloadProduct);

        $payloadCloths = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Material' => $this->input->post('tbxMaterial'),
            'Color' => $this->input->post('tbxColor'),
        );
        // $dbResponseCloths = 
        $this->ClothsTable->insert($payloadCloths);


        // if ($dbResponseCloths->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
        //     $this->form_validation->set_message('db_err', $dbResponseCloths->error, $dbResponseProducts->error);
        //     $this->templator->load('AdminLayout', 'admin/cloths/add');
        //     return;
        // }

        redirect('admin/clothes-management');
    }

    public function edit_view(int $id)
    {
        $data['item'] = $this->ClothsTable->selectOne(array(), "ProductId=$id");
        $data['product'] = $this->ProductsTable->selectOne(array(), "Id=$id");

        $options = array();
        $brands = $this->BrandTable->select();
        foreach ($brands as $b) {
            $options += array($b->Id => $b->Name);
        };
        $data['brands'] = $options;

        $options = array();
        $categories = $this->CategoryTable->select();
        foreach ($categories as $c) {
            $options += array($c->Id => $c->Name);
        };
        $data['categories'] = $options;

        $this->templator->load('AdminLayout', 'admin/cloths/edit', $data);
    }

    public function edit_post()
    {
        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );

        $this->ProductsTable->update(
            $this->input->post('tbxId'),
            $payloadProduct
        );

        $payloadCloths = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Material' => $this->input->post('tbxMaterial'),
            'Color' => $this->input->post('tbxColor'),
        );
        $this->ClothsTable->update(
            $this->input->post('tbxId'),
            $payloadCloths
        );
        redirect('admin/cloths-management');
    }

    public function delete_post($id)
    {
        $this->ClothsTable->delete($id);
        $this->ProductsTable->delete($id);
        redirect('admin/clothes-management');
    }
}
