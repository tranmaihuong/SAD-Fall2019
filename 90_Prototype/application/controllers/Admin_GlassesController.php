<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_GlassesController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Glasses_model', 'GlassesTable');
        $this->load->model('Brand_model', 'BrandTable');
        $this->load->model('Category_model', 'CategoryTable');
        $this->load->model('Product_model', 'ProductsTable');
    }

    public function index()
    {
        $data['glasses'] = $this->GlassesTable->select();
        $this->templator->load('AdminLayout', 'admin/glasses/view', $data);
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
        $this->templator->load('AdminLayout', 'admin/glasses/add', $data);
    }


    public function create_post()
    {
        $this->form_validation->set_rules('tbxName', 'Glasses name', 'required');

        if (!$this->form_validation->run()) {
            $this->templator->load('AdminLayout', 'admin/glasses/add');
            return;
        }

        $payloadProduct = array(
            'CategoryId' => $this->input->post('CategoryId'),
            'BrandId' => $this->input->post('BrandId'),
            'Name' => $this->input->post('tbxName'),
            'Price' => $this->input->post('tbxPrice'),
        );
        $dbResponseProducts = $this->ProductsTable->insert($payloadProduct); 

        $payloadGlasses = array(
            'ProductId' => $this->ProductsTable->getLastId(),
            'Gender' => $this->input->post('tbxGender'),
            'Shape' => $this->input->post('tbxShape'),
            'Material' => $this->input->post('tbxMaterial'),
            'LensWidth' => $this->input->post('tbxLensWidth'),
            'LensWidthWithoutFrame' => $this->input->post('tbxLensWidthWithoutFrame'),
            'LensHeight' => $this->input->post('tbxLensHeight'),
            'ArmLength' => $this->input->post('tbxArmLength'),
            'BridgeWidth' => $this->input->post('tbxBridgeWidth'),
        );
        $dbResponseGlasses = $this->GlassesTable->insert($payloadGlasses);


        if ($dbResponseGlasses->affectedRows == 0 || $dbResponseProducts->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponseGlasses->error, $dbResponseProducts->error);
            $this->templator->load('AdminLayout', 'admin/glasses/add');
            return;
        }

        redirect('admin/glasses-management');
    }

    public function edit_view(int $id)
    {
        $data['item'] = $this->GlassesTable->selectOne(array(), "`Id`='$id'");
        $this->templator->load('AdminLayout', 'admin/glasses/edit', $data);
    }

    public function edit_post()
    {
        $this->form_validation->set_rules('tbxName', 'Glasses name', 'required');

        if (!$this->form_validation->run()) {
            $this->templator->load('AdminLayout', 'admin/glasses/edit');
            return;
        }
        $payload = array(
            'Name' => $this->input->post('tbxName')
        );

        $dbResponse = $this->GlassesTable->update(
            $this->input->post('tbxId'),
            $payload
        );
        if ($dbResponse->affectedRows == 0) {
            $this->form_validation->set_message('db_err', $dbResponse->error);
            $this->templator->load('AdminLayout', 'admin/glasses/edit');
            return;
        }

        redirect('admin/glasses-management/edit/' . $this->input->post('tbxId'));
    }

    public function delete(int $id)
    {
        $this->GlassesTable->delete($id);
        redirect('admin/glasses-management');
    }
}
