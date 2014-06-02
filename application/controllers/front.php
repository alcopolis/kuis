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
		$this->load->helper('cookie');
        $this->load->library('pagination');
    }

    public function render_article($view, $data) {
        if ($this->session->userdata('logged_in')) {
            $data['user_fullname'] = $this->session->userdata['full_name'];
        }

        $this->session->set_userdata(array('last_viewed' => current_url()));

        $data['notif'] = $this->session->flashdata('notif');

        $this->load->view($view, $data);
    }

    public function index($page = 'home') {

        $data['title'] = 'Innovate Ceritamu | ';
        $data['recent_articles'] = $this->article_model->get_recent();
        $data['page'] = $page;

        if ($this->session->userdata('logged_in')) {
            $data['recent_articles'] = $this->article_model->get_recent();
            $data['user_fullname'] = $this->session->userdata['full_name'];
        }
		
		$data['notif'] = $this->session->flashdata('notif');
        $this->load->view('front/index', $data);
    }
	
	
	// View All Articles 
	public function articles() {
		$data['page'] = 'articles';
		$data['title'] = 'Innovate Ceritamu | ';
		
		$config['base_url'] = base_url() . 'articles';
		$config['total_rows'] = $this->article_model->record_count(array('status'=>'approved'));
		$config['per_page'] = 12;
		$config["uri_segment"] = 2;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = TRUE;
		//$config['first_link'] = '<span id="first-page" class="nav-arr"><<</span>';
		//$config['last_link'] = '<span id="first-page" class="nav-arr">>></span>';
		$config['next_link'] = '<span id="next-page" class="nav-arr">Next</span>';
		$config['prev_link'] = '<span id="prev-page" class="nav-arr">Prev</span>';
		
		$this->pagination->initialize($config); 
		
		$paging_page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
		if($paging_page <= 1){
			$start = 0;
		}else{
			$start = ($paging_page - 1) * $config['per_page'];
		}
				
		$art_data = array();
		$temp = $this->db->where('status','approved')->order_by('approved_date', 'DESC')->limit($config['per_page'], $start)->get('article')->result();
		
		foreach($temp as $t){
			$art_data[$t->article_id]['user'] = $this->article_model->get_author_data($t->user_id, NULL);
			$art_data[$t->article_id]['content'] = $t; 
			$art_data[$t->article_id]['fav_state'] =  $this->check_favorite($t->article_id);
		}
		
		$data['art_cookies'] = get_cookie('liked');
		$data['articles'] = $art_data;
		$data["paging_links"] = $this->pagination->create_links();
		
		$data['recent_articles'] = $this->article_model->get_recent();
	
		$this->render_article('front/index',$data);
	}
	
	
	
	public function article($slug='') {
		$data['article'] = $this->article_model->get_articles_by('', array('article_slug'=>$slug), TRUE);
		$data['recent_articles'] = $this->article_model->get_recent();
			
		if($slug == '' OR count($data['article']) == 0){
			$data['page'] = '404';
			$data['title'] = 'Innovate Ceritamu | ';
			$data['article'] = NULL;
		}else{
			$data['page'] = 'article';
			$data['title'] = $data['article']->article_title;
		
			$data['author'] = $this->article_model->get_author_data($data['article']->user_id);
			$data['category'] = $this->category_model->get_detail($data['article']->category_id);
			$data['recent_articles'] = $this->article_model->get_recent();
			
			$data['fav_state'] = $this->check_favorite($data['article']->article_id);
			
			$sql = "UPDATE article SET view_count=view_count+1 WHERE article_slug='" . $slug ."'";
			$this->db->query($sql);
		}
		
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
			'article_title' => str_replace(array("'", "*"), '', $this->input->post('article_title')),
            'article_slug' => $this->article_model->toAscii($this->input->post('article_title'), "'", '_'),
//            'article_desc' => $this->input->post('article_desc'),
            'article_body' => $this->input->post('article_body'),
            'category_id' => $this->input->post('category_id'),
			'provider' => $this->input->post('provider'),
			'usage' => $this->input->post('usage'),
            'user_id' => $this->session->userdata('user_id')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->article_model->upload_pic('./article/');
            if ($status['status'] == TRUE) {
                $article['article_pic'] = $status['img_name'];
            }else{
				$this->session->set_flashdata('notif', 'Maaf proses upload gagal karena ukuran gambar yang anda pilih melebihi batas maksimal 300Kb.');
				redirect('create_article');
			}
        } else if ($_FILES['content']['error'] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
            redirect('create_article');
        } else {
            $this->session->set_flashdata('notif', 'File gambar produk rusak');
            redirect('create_article');
        }
        $id = NULL;
        if ($this->article_model->save($id, $article)) {
            //redirect('article/' . $article['article_slug']);
        //} else {
			$this->session->set_flashdata('notif', 'Terima kasih, Cerita Anda sudah tersimpan.');
            redirect('articles');
        }
    }
	
	
	
	
	public function login() {
		$last_viewed_page = $this->input->post('last_viewed');
		
        switch ($this->user_model->authenticate_user($this->input->post('email'), $this->input->post('pwd'))) {
            case 0:
                $this->session->set_flashdata('notif', 'Email yang Anda masukkan belum terdaftar, silahkan lakukan registrasi terlebih dahulu');
                redirect($last_viewed_page);
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Mohon maaf, account Anda belum aktif');
                redirect($last_viewed_page);
                break;
            case 2:
                $this->session->set_flashdata('notif', 'Mohon maaf, password yang Anda masukkan salah');
                redirect($last_viewed_page);
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
                redirect($last_viewed_page);
                break;
        }
    }
	
	public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect(site_url());
    }

    public function register() {
		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('pwd', 'Password', 'required|matches[confirm]');
		$this->form_validation->set_rules('confirm', 'Konfirmasi Password', 'required');
		
		$this->form_validation->set_message('required', '! Lengkapi - %s');
		$this->form_validation->set_message('valid_email', '! Email tidak valid');
		$this->form_validation->set_message('is_unique', '! Email Anda telah terdaftar');
		$this->form_validation->set_message('matches', '! Password tidak sama');
		
		if($this->form_validation->run()){
			$register = array(
				'email' => $this->input->post('email'),
				'full_name' => $this->input->post('full_name'),
				'pwd' => $this->input->post('pwd')
			);
	
			if ($this->user_model->register($register)) {
				$this->session->set_flashdata('notif', 'Terima kasih telah mendaftar. Silahkan cek email Anda untuk konfirmasi.');
				redirect('/');
			} 
		}else{
			$this->session->set_flashdata('notif', validation_errors('<span style="display:block;">', '</span>'));
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
	
	
	//public function page_not_found() {
//		$data['page'] = '404';
//		$this->load->view('front/index', $data);
//	}
	
	//-------------------- AJAX Function ------------------------------//
	
	public function set_favorite($id){
		$liked = $this->get_favorite();
		$liked[] = $id;
		
		$cookie = array(
                   'name'   => 'liked',
                   'value'  => json_encode($liked),
                   'expire' => 60*60*60*24*30,
                   'domain' => 'www.kuis.com',
                   'path'   => '/',
               );
		
		set_cookie($cookie); 
		
		$this->like_counter($id);
		
		$respond['status'] = TRUE;
		echo json_encode($respond); 
	}
	
	
	private function get_favorite(){
		$result = get_cookie('liked');
		
		if($result != NULL){
			return json_decode($result);
		}else{
			return FALSE;
		}
	}
	
	private function check_favorite($id){
		$liked = $this->get_favorite();
		if($liked != NULL){
			return in_array($id, $liked);	
		}
	}

    public function view_counter($id) {
        //echo $id;
        //$this->db->update('article', $data, "id = 4");	

        $sql = "UPDATE article SET view_count=view_count+1 WHERE article_id=" . $id;
        if ($this->db->query($sql)) {
            echo 'success';
        }
    }

    public function like_counter($id) {
        $sql = "UPDATE article SET like_count=like_count+1 WHERE article_id=" . $id;
        if ($this->db->query($sql)) {
            $respond = array(
                'status' => TRUE
            );

            //echo json_encode($respond);
        }
    }
}
