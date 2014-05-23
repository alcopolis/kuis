<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
		ob_start();
        $this->load->model('user_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['title'] = 'Login';
            $data['action'] = site_url('user/login');
            $data['view'] = '';
            $this->load->view('admin/login', $data);
        } else {
            $this->logout();
        }
    }

    public function login() {
        switch ($this->user_model->authenticate_user($this->input->post('email'), $this->input->post('password'))) {
            case 0:
                $this->session->set_flashdata('notif', 'Email yang Anda masukkan belum terdaftar, silahkan lakukan registrasi terlebih dahulu');
                redirect('user');
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Mohon maaf, account Anda belum aktif');
                redirect('user');
                break;
            case 2:
                $this->session->set_flashdata('notif', 'Mohon maaf, password yang Anda masukkan salah');
                redirect('user');
                break;
            case 3:
                $data = $this->user_model->get_detail_email($this->input->post('email'));
                $newdata = array(
                    'id_user' => $data[0]->id_user,
                    'full_name' => $data[0]->full_name,
                    'role' => $data[0]->role,
                    'is_active' => $data[0]->is_active,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('notif', 'Selamat datang ' . $this->session->userdata('full_name'));
                if ($data[0]->role == 'user') {
                    redirect('/');
                } else {
                    redirect('user/dashboard_admin');
                }
                break;
        }
    }

//logout action
    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('user');
    }

    public function dashboard_admin() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user') {
            $data['page'] = 'dashboard';
            $data['notif'] = $this->session->flashdata('notif');
            $data['title'] = 'Dashboard';
            $data['view'] = 'admin/dashboard';
            $this->load->view('admin/template_admin', $data);
        } else {
            redirect('user');
        }
    }

    public function register() {
	
		$register = array(
			'email' => $this->input->post('email'),
			'full_name' => $this->input->post('full_name'),
			'pwd' => $this->input->post('pwd')
		);
		
		if ($this->user_model->register($register)) {
			$this->session->set_flashdata('notif', 'Terima kasih telah mendaftar bersama kami');
			redirect('user/dashboard_admin');
		} else {
			$this->session->set_flashdata('notif', 'Mohon maaf email Anda telah terdaftar sebelumnya');
			redirect('user/dashboard_admin');
		}
    }

    public function email_activation() {
        $id_user = $this->uri->segment(3);
        $hash = $this->uri->segment(4);
        if ($id_user && $hash) {
            $res = $this->user_model->activation($id_user, $hash);
            if ($res == 'user') {
                redirect('front');
            } else {
                redirect('front');
            }
        } else {
            $this->session->set_flashdata('notif', 'you have an error page here');
            redirect('front');
        }
    }

    public function view_admin() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user') {
            $data['page'] = 'admin';
            $data['notif'] = $this->session->flashdata('notif');
            $data['admin'] = $this->user_model->get_all_admin();
            $data['title'] = 'Lihat Admin';
            $data['view'] = 'admin/admin_view';
            $this->load->view('admin/template_admin', $data);
        } else {
            redirect('user');
        }
    }

    public function add_admin() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user') {
            $data['page'] = 'admin';
            $data['notif'] = $this->session->flashdata('notif');
            $data['action'] = site_url('user/save_admin');
            $data['role_drop'] = $this->user_model->get_role_drop();
            $data['title'] = 'Tambah Admin';
            $data['view'] = 'admin/admin_input';
            $this->load->view('admin/template_admin', $data);
        } else {
            redirect('user');
        }
    }

    public function save_admin() {
        $admin = array(
            'email' => $this->input->post('email'),
            'full_name' => $this->input->post('full_name'),
            'pwd' => $this->input->post('pwd'),
            'role' => $this->input->post('role')
        );
        if ($this->user_model->register($admin)) {
            $this->session->set_flashdata('notif', 'Mohon maaf email Anda telah terdaftar sebelumnya');
            redirect('user/add_admin');
        } else {
            redirect('user/view_admin');
        }
    }

    public function delete($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->user_model->delete($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function view_member() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != 'user') {
            $data['page'] = 'member';
            $data['notif'] = $this->session->flashdata('notif');
            $data['member'] = $this->user_model->get_all_member();
            $data['title'] = 'Lihat Member';
            $data['view'] = 'admin/member_view';
            $this->load->view('admin/template_admin', $data);
        } else {
            redirect('user');
        }
    }

    public function activate_user($id = NULL, $val = NULL) {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $status = $this->user_model->update_isActive($id, $val);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function unbanned_user($id = NULL, $val = NULL) {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $status = $this->user_model->unbanned_user($id, $val);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

}
