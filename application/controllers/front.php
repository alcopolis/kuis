<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Front extends CI_Controller {
	
	
	//$paging_config;
	
	
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('article_model');
        $this->load->model('category_model');
		$this->load->library('pagination');
    }
	
	
	public function render_article($view, $data){
		if ($this->session->userdata('logged_in')) {
			$data['user_fullname'] = $this->session->userdata['full_name'];
		}
		
		$this->session->set_userdata(array('last_viewed' => current_url()));
		
		$data['notif'] = $this->session->flashdata('notif');
		
		$this->load->view($view, $data);	
	}
	

    public function index($page = 'home') {
		
        $data['title'] = 'Innovate Ceritamu | ';
		$data['notif'] = NULL;
		$data['recent_articles'] = $this->article_model->get_recent();
		$data['page'] = $page;
		
        if ($this->session->userdata('logged_in')) {
			$data['recent_articles'] = $this->article_model->get_recent();
			$data['user_fullname'] = $this->session->userdata['full_name'];
		}else{
			$data['notif'] = $this->session->flashdata('notif');
		}
		
		$this->load->view('front/index', $data);
    }
	
	
	// View All Articles 
	public function articles() {
		$data['page'] = 'articles';
		$data['title'] = 'Innovate Ceritamu | ';
		
		$config['base_url'] = base_url() . 'articles';
		$config['total_rows'] = $this->article_model->record_count();
		$config['per_page'] = 12;
		$config["uri_segment"] = 2;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = '<span id="first-page" class="nav-arr"><<</span>';
		$config['last_link'] = '<span id="first-page" class="nav-arr">>></span>';
		$config['next_link'] = '<span id="next-page" class="nav-arr">></span>';
		$config['prev_link'] = '<span id="prev-page" class="nav-arr"><</span>';
		
		$this->pagination->initialize($config); 
		
		$paging_page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		if($paging_page <= 1){
			$start = 0;
		}else{
			$start = ($paging_page - 1) * $config['per_page'];
		}
				
		$art_data = array();
		$temp = $this->db->order_by('article_date', 'DESC')->limit($config['per_page'], $start)->get('article')->result();
		
		foreach($temp as $t){
			$art_data[$t->article_id]['user'] = $this->article_model->get_author_data($t->user_id, NULL);
			$art_data[$t->article_id]['content'] = $t; 
		}
		
		
		$data['articles'] = $art_data;
		$data["paging_links"] = $this->pagination->create_links();
		
		$data['recent_articles'] = $this->article_model->get_recent();
	
		$this->render_article('front/index',$data);
	}
	
	
	
	// View Article
//	public function article($id) {
//		$data['article'] = $this->article_model->get_articles_by('', array('article_id'=>$id), TRUE);
//		$data['author'] = $this->article_model->get_author_data($data['article']->user_id);
//		$data['recent_articles'] = $this->article_model->get_recent();
//		
//		$data['title'] = $data['article']->article_title;
//		$data['page'] = 'article';
//		
//		$sql = "UPDATE article SET view_count=view_count+1 WHERE article_id=" . $id;
//		$this->db->query($sql);
//		
//		$this->render_article('front/index',$data);
//	}
	
	
	public function article($slug) {
		$data['article'] = $this->article_model->get_articles_by('', array('article_slug'=>$slug), TRUE);
		$data['author'] = $this->article_model->get_author_data($data['article']->user_id);
		$data['recent_articles'] = $this->article_model->get_recent();
		
		$data['title'] = $data['article']->article_title;
		$data['page'] = 'article';

		
		$sql = "UPDATE article SET view_count=view_count+1 WHERE article_slug='" . $slug ."'";
		$this->db->query($sql);
		
		$this->render_article('front/index',$data);
	}
	
	
	
	public function create_article() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Innovate Ceritamu | ';
		$data['page'] = 'create';
        $data['action'] = site_url('front/save_article');
        $data['category_drop'] = $this->category_model->get_category_drop();
        $this->render_article('front/create', $data);
    }

    public function save_article() {
        $article = array(
            'article_title' => $this->input->post('article_title'),
            'article_slug' => str_replace(' ', '_', $this->input->post('article_title')),
            'article_desc' => $this->input->post('article_desc'),
            'article_body' => $this->input->post('article_body'),
            'category_id' => $this->input->post('category_id'),
            'user_id' => $this->session->userdata('user_id')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->article_model->upload_pic('./article/');
            if ($status['status'] == TRUE) {
                $article['article_pic'] = $status['img_name'];
            }
        } else if ($_FILES['content']['error'] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
            redirect('front/create_article');
        } else {
            $this->session->set_flashdata('notif', 'File gambar produk rusak');
            redirect('front/create_article');
        }
        $id = NULL;
        if ($this->article_model->save($id, $article)) {
            redirect('front/create_article');
        } else {
            redirect('front/create_article');
        }
    }
	
	public function login() {
        switch ($this->user_model->authenticate_user($this->input->post('email'), $this->input->post('password'))) {
            case 0:
                $this->session->set_flashdata('notif', 'Email yang Anda masukkan belum terdaftar, silahkan lakukan registrasi terlebih dahulu');
                redirect(site_url());
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Mohon maaf, account Anda belum aktif');
                redirect(site_url());
                break;
            case 2:
                $this->session->set_flashdata('notif', 'Mohon maaf, password yang Anda masukkan salah');
                redirect(site_url());
                break;
            case 3:
                $data = $this->user_model->get_detail_email($this->input->post('email'));
                $newdata = array(
                    'user_id' => $data[0]->user_id,
                    'full_name' => $data[0]->full_name,
                    'role' => $data[0]->role,
                    'is_active' => $data[0]->is_active,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('notif', 'Selamat datang ' . $this->session->userdata('full_name'));
                
                redirect(site_url());
                break;
        }
    }
	
	public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('/');
    }
	
	public function register() {
        $register = array(
            'email' => $this->input->post('email'),
            'full_name' => $this->input->post('full_name'),
            'pwd' => $this->input->post('pwd')
        );
        
		if (!$this->user_model->register($register)) {
            $this->session->set_flashdata('notif', 'Mohon maaf email Anda telah terdaftar sebelumnya');
            redirect('/');
        } else {
            redirect('/');
        }
    }

    public function email_activation() {
        $id_user = $this->uri->segment(3);
        $hash = $this->uri->segment(4);
        if ($id_user && $hash) {
            $res = $this->user_model->activation($id_user, $hash);
            if ($res == 'user') {
                redirect('user/dashboard_admin');
            } else {
                redirect('user/dashboard_admin');
            }
        } else {
            $this->session->set_flashdata('notif', 'you have an error page here');
            redirect('user/dashboard_admin');
        }
    }
	
	
	//-------------------- AJAX Function ------------------------------//
	
	public function view_counter($id){
		//echo $id;
		//$this->db->update('article', $data, "id = 4");	
		
		$sql = "UPDATE article SET view_count=view_count+1 WHERE article_id=" . $id;
		if($this->db->query($sql)){
			echo 'success';
		}
	}
	
	public function like_counter($id){		
		$sql = "UPDATE article SET like_count=like_count+1 WHERE article_id=" . $id;
		if($this->db->query($sql)){
			$respond = array(
				'status'=>TRUE
			);
		
			echo json_encode($respond);
		}
	}
}
