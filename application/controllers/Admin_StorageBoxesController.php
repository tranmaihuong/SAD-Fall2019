<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_StorageBoxesController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StorageBoxes_model', 'StorageBoxesTable');
        $this->load->model('Brand_model', 'BrandTable');
        $this->load->model('Category_model', 'CategoryTable');
        $this->load->model('Product_model', 'ProductsTable');
    }

    public function index()
    {
        $data['allStorageBoxes'] = $this->StorageBoxesTable->select();
        $this->templator->load('AdminLayout', 'admin/storageboxes/view', $data);
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
        $this->templator->load('AdminLayout', 'admin/storageboxes/add', $data);
    }

    public function create_post()
    {
        $this->form_validation->set_rules('tbxName', 'StorageBoxes name', 'required');

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        $dbResponseProducts = $this->ProductsTable->insert($payloadProduct);

        $payloadStorageBoxes = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Material' => $this->input->post('tbxMaterial'),
            'Width' => $this->input->post('tbxWidth'),
            'Height' => $this->input->post('tbxHeight'),
        );
        $dbResponseStorageBoxes = $this->StorageBoxesTable->insert($payloadStorageBoxes);


        if ($dbResponseStorageBoxes->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponseStorageBoxes->error, $dbResponseProducts->error);
            $this->templator->load('AdminLayout', 'admin/storageboxes/add');
            return;
        }

        redirect('admin/boxes-management');
    }

    public function edit_view(int $id)
    {
        $data['item'] = $this->StorageBoxesTable->selectOne(array(), "ProductId=$id");
        
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

        $this->templator->load('AdminLayout', 'admin/storageboxes/edit', $data);
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

        $payloadStorageBoxes = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Material' => $this->input->post('tbxMaterial'),
            'Width' => $this->input->post('tbxWidth'),
            'Heigth' => $this->input->post('tbxHeigth'),
        );
        $this->StorageBoxesTable->update(
            $this->input->post('tbxId'),
            $payloadStorageBoxes
        );
        redirect('admin/boxes-management');
    }

    public function delete($id)
    {
        $this->StorageBoxesTable->delete($id);
        $this->ProductsTable->delete($id);
        redirect('admin/boxes-management');
    }
}
