<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user' && $this->session->userdata('is_active')) {
            $this->load->model('category_model');
        } else {
            redirect();
        }
    }

    public function view() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['page'] = 'article';
        $data['category'] = $this->category_model->get_all();
        $data['action_save'] = site_url('category/save');
        $data['title'] = 'Lihat Kategori';
        $data['view'] = 'admin/category_view';
        $this->load->view('admin/template_admin', $data);
    }

    public function save() {
        $category = array(
            'category_name' => $this->input->post('category_name')
        );
        $id = $this->input->post('category_id') ? $this->input->post('category_id') : NULL;
        $this->category_model->save($id, $category);
        redirect('category/view');
    }

    public function edit($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['page'] = 'article';
        $data['category'] = $this->category_model->get_all();
        $data['category_detail'] = $this->category_model->get_detail($id);
        $data['action_save'] = site_url('category/save');
        $data['title'] = 'Lihat Kategori';
        $data['view'] = 'admin/category_view';
        $this->load->view('admin/template_admin', $data);
    }

    public function delete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->category_model->delete($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

}
