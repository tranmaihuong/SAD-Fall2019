<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_StorageBoxesController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Boxes_model', 'BoxesTable');
    }
    public function index()
    {
        $data['all'] = $this->SpraysTable->select();
        $this->templator->load('AdminLayout', 'admin/storageboxes/view', $data);
    }
    public function create_view()
    {
        $this->templator->load('AdminLayout', 'admin/storageboxes/add');
    }

    public function create_post()
    {
        $payload = array(
//          'ProductId' => $this->input->post('tbxID'),
            'Material' => $this->input->post('tbxType'),
            'Width' => $this->input->post('tbxWidth'),
            'Height' => $this->input->post('tbxHeight')
        );

        $this->Sprays_model->insert($payload);
        redirect('admin/boexs-management');
    }
    public function edit_view(int $id)
    {
        $data['item'] = $this->BoxesTable->selectOne(array(), "Id=$id");
        $this->templator->load('AdminLayout', 'admin/storageboxes/edit', $data);
    }

    public function edit_post()
    {
        $payload = array(
//			'ProductId' => $this->input->post('tbxId'),
            'Material' => $this->input->post('tbxType'),
            'Width' => $this->input->post('tbxWidth'),
            'Height' => $this->input->post('tbxHeight')
        );
        $this->BoxesTable->update($this->input->post('tbxId'), $payload);

        redirect('admin/boxes-management');
    }

    public function delete(int $id)
    {
        $this->BoxesTable->delete($id);
        redirect('admin/boxes-management');
    }
}
