<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_SpraysController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sprays_model', 'SpraysTable');
        $this->load->model('Brand_Model', 'BrandTable');
        $this->load->model('Category_Model', 'CategoryTable');
        $this->load->model('Product_Model', 'ProductsTable');
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

        $options = array();
        $categories = $this->CategoryTable->select();
        foreach ($categories as $c) {
            $options += array($c->Id => $c->Name);
        };
        $data['categories'] = $options;
        $this->templator->load('AdminLayout', 'admin/sprays/add',$data);
    }

    public function create_post()
    {
        $this->form_validation->set_rules('tbxName', 'Sprays name', 'required');

        if (!$this->form_validation->run()) {
            $this->templator->load('AdminLayout', 'admin/sprays/add');
            return;
        }

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        $dbResponseProducts = $this->ProductsTable->insert($payloadProduct); 

        $payloadSprays = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Type' => $this->input->post('tbxType'),

        );
        $dbResponseSprays = $this->SpraysTable->insert($payloadSprays);

        if ($dbResponseSprays->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponseSprays->error, $dbResponseProducts->error);
            $this->templator->load('AdminLayout', 'admin/sprays/add');
            return;
        }
        redirect('admin/sprays-management');
    }

    public function edit_view(int $id)
    {
        $data['item'] = $this->SpraysTable->selectOne(array(), "ProductId=$id");
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

        $this->templator->load('AdminLayout', 'admin/sprays/edit', $data);
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

        $payloadSprays = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Type' => $this->input->post('tbxType'),

        );
        $this->SpraysTable->update(
            $this->input->post('tbxId'),
            $payloadSprays
        );
        redirect('admin/sprays-management');
    }

    public function delete(int $id)
    {
        $this->SpraysTable->delete($id);
        $this->ProductsTable->delete($id);
        redirect('admin/sprays-management');
    }
    
    
}
