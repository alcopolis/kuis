<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user' && $this->session->userdata('is_active')) {
            $this->load->model('article_model');
        } else {
            $this->session->set_flashdata('notif', 'Login as admin first');
            redirect();
        }
    }

    public function view() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['page'] = 'article';
        $data['article'] = $this->article_model->get_all_article();
        $data['title'] = 'Lihat Artikel';
        $data['view'] = 'admin/article_view';
        $this->load->view('admin/template_admin', $data);
    }

    public function delete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->article_model->delete($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function update_status($id = NULL, $stat = NULL) {
        $id = $this->input->post('id');
        $stat = $this->input->post('stat');
        $status = $this->article_model->update_status($id, $stat);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function detail($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['page'] = 'article';
        $data['article_detail'] = $this->article_model->get_detail_article($id);
        $data['title'] = 'Detail Artikel';
        $data['view'] = 'admin/article_detail';
        $this->load->view('admin/template_admin', $data);
    }

    public function edit($id) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['page'] = 'article';
        $data['action'] = site_url('admin_article/update');
        $data['article_detail'] = $this->article_model->get_detail_article($id);
        $data['title'] = 'Edit Artikel';
        $data['view'] = 'admin/article_edit';
        $this->load->view('admin/template_admin', $data);
    }

    public function update() {
        $article = array(
            'article_title' => $this->input->post('article_title'),
            'article_desc' => $this->input->post('article_desc'),
            'article_body' => $this->input->post('article_body'),
            'update_date' => date('Y-m-d H:i:s'),
            'update_by' => $this->session->userdata('id_user')
        );
        $id = $this->input->post('user_id');
        if ($this->article_model->save($id, $article)) {
            redirect('admin_article/detail/' . $id);
        } else {
            redirect('admin_article/edit/' . $id);
        }
    }

}
