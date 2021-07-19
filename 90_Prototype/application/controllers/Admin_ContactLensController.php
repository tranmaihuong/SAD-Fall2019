<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ContactLensController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ContactLens_model', 'ContactLensTable');
        $this->load->model('Brand_model', 'BrandTable');
        $this->load->model('Category_model', 'CategoryTable');
        $this->load->model('Product_model', 'ProductsTable');
    }

    public function index()
    {
        $data['contactLens'] = $this->ContactLensTable->select();
        $this->templator->load('AdminLayout', 'admin/contactLens/view', $data);
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
        $this->templator->load('AdminLayout', 'admin/contactLens/add', $data);
    }


    public function create_post()
    {
        $this->form_validation->set_rules('tbxName', 'Contact Lens name', 'required');

        if (!$this->form_validation->run()) {
            $this->templator->load('AdminLayout', 'admin/contactLens/add');
            return;
        }

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        $dbResponseProducts = $this->ProductsTable->update($this->input->post('tbxId'),$payloadProduct);

        $payloadContactLens = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Package' => $this->input->post('tbxPackage'),
            'WaterOfPercentage' => $this->input->post('tbxWaterOfPercentage'),
            'LensPerBox' => $this->input->post('tbxLensPerBox'),
            'DIA' => $this->input->post('tbxDIA'),
        );
        $dbResponseContactLens = $this->ContactLensTable->update($this->input->post('tbxId'),$payloadContactLens);


        if ($dbResponseContactLens->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponseContactLens->error, $dbResponseProducts->error);
            $this->templator->load('AdminLayout', 'admin/contactLens/add');
            return;
        }

        redirect('admin/contactlens-management');
    }

    public function edit_view(int $id)
    {
        // $data['item'] = $this->ContactLensTable->selectOne(array(), "`ProductId`='$id'");
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

        $this->templator->load('AdminLayout', 'admin/contactLens/edit', $data);
    }

    public function edit_post()
    {
        $this->form_validation->set_rules('tbxName', 'Contact Lens name', 'required');

        if (!$this->form_validation->run()) {
            $this->templator->load('AdminLayout', 'admin/contactLens/edit');
            return;
        }

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        $dbResponseProducts = $this->ProductsTable->insert($payloadProduct);

        $payloadContactLens = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Package' => $this->input->post('tbxPackage'),
            'WaterOfPercentage' => $this->input->post('tbxWaterOfPercentage'),
            'LensPerBox' => $this->input->post('tbxLensPerBox'),
            'DIA' => $this->input->post('tbxDIA'),
        );
        $dbResponseContactLens = $this->ContactLensTable->insert($payloadContactLens);


        if ($dbResponseContactLens->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponseContactLens->error, $dbResponseProducts->error);
            $this->templator->load('AdminLayout', 'admin/contactLens/edit');
            return;
        }

        redirect('admin/contactlens-management' . $this->input->post('tbxId'));
    }

    public function deleteContactLens($id, $productId)
    {
        $this->ContactLensTable->deleteContactLens($id, $productId);
        redirect('admin/contactlens-management');
    }
}
