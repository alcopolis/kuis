<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends CI_Model {

    //public function register($data) {
//        if (!$this->check_email($data['email'])) {
//            $data['key'] = do_hash(date('Y-m-d H:i:s'), 'MD5');
//            $data['pwd'] = do_hash($data['pwd'], 'MD5');
//            if ($this->db->insert('user', $data)) {
//                $user_id = $this->db->insert_id();
//                $msg = $this->msg_activation($user_id);
//                $this->send_email($user_id, $msg, 'Email Activation');
//                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
//				return true;
//            } else {
//                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
//            return FALSE;
//            }
//        } else {
//            return FALSE;
//        }
//    }
	
	
	public function register($data) {
            $data['key'] = do_hash(date('Y-m-d H:i:s'), 'MD5');
            $data['pwd'] = do_hash($data['pwd'], 'MD5');
            
			if ($this->db->insert('user', $data)) {
                $user_id = $this->db->insert_id();
                $msg = $this->msg_activation($user_id);
                $this->send_email($user_id, $msg, 'Email Activation');
               //$this->session->set_flashdata('notif', 'Terima kasih sudah melakukan pendaftaran, silahkan cek email Anda untuk konfirmasi.');
				return true;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            	return FALSE;
            }
    }
	
	

    public function check_email($email) {
        $query = $this->db->get_where('user', array('email' => $email));
        $result = $query->result();
        return $result ? TRUE : FALSE;
    }

    public function get_detail($user_id) {
        $query = $this->db->get_where('user', array('user_id' => $user_id));
        return $query->result();
    }

    public function get_detail_email($email) {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->result();
    }

    public function authenticate_user($email, $pwd) {
        $query = $this->db->get_where('user', array('email' => $email));
        if ($query->num_rows() > 0) {
            $data = $query->result();
            if ($data[0]->is_active) {
                $response = $data[0]->pwd == do_hash($pwd, 'MD5') ? '3' : '2'; //if 3 auth done ; if 2 password 
            } else {
                $response = 1; //account belum active
            }
        } else {
            $response = 0; //email tidak tersedia
        }
        return $response;
    }

    public function send_email($user_id, $msg, $sbj) {
        $user = $this->get_detail($user_id);
        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "mail.innovate-indonesia.com",
            'smtp_port' => 25,
            'smtp_user' => "webmaster@innovate-indonesia.com",
            'smtp_pass' => "webmaster",
            'mailtype' => "html",
            'charset' => "iso-8859-1",
            'wordwrap' => "TRUE"
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $subject = $sbj;
        $this->email->from('webmaster@innovate-indonesia.com', 'Innovate Indonesia');
        $this->email->to($user[0]->email);
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();
    }

    public function msg_activation($user_id) {
        $user = $this->get_detail($user_id);
        $msg = '
            Thanks for signing up!<br/>
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br/><br/> 
            
			Please click this link to activate your account:<br/>
 
            ' . site_url('user/email_activation/' . $user[0]->user_id . '/' . $user[0]->key);
        return $msg;
    }

    public function activation($user_id, $key) {
        $user = $this->get_detail($user_id);
        if (isset($user)) {
            if ($user[0]->key == $key) {
                $this->db->update('user', array('is_active' => 1, 'key' => ''), array('user_id' => $user_id, 'key' => $key));
                $this->session->set_userdata('role_user', $user[0]->role);
            } else {
                $this->session->set_flashdata('notif', 'account anda telah aktif sebelumnya.');
            }
            return $user[0]->role;
        } else {
            $this->session->set_flashdata('notif', 'Terima kasih, account anda tidak terdaftar silahkan lakukan registrasi');
        }
    }

    public function get_all_admin() {
        $this->db->where('role !=', 'user');
        $query = $this->db->get('user');
        return $query->result();
    }

    public function get_role_drop() {
        $data[''] = 'Pilih satu';
        $query = $this->db->query("SHOW COLUMNS FROM user LIKE 'role'")->row(0)->Type;
        preg_match("/^enum\((.*)\)$/", $query, $matches);
        $param = explode(',', $matches[1]);
        foreach ($param as $row) {
            $data[trim($row, "'")] = trim($row, "'");
        }
        unset($data['user']);
        return $data;
    }

    public function get_all_member() {
        $this->db->where('role =', 'user');
        $query = $this->db->get('user');
        return $query->result();
    }

    public function delete($id) {
        $result = $this->get_detail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM user WHERE user_id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function update_isActive($id, $val) {
        $user = $this->get_detail($id);
        if ($user) {
            $this->db->update('user', array('is_active' => $val), array('user_id' => $id));
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
