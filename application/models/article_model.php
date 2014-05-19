<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Article_model extends CI_Model {

    protected $_table = 'article';

    public function __construct() {
        parent::__construct();
    }

    public function get_author_data($id, $fields = NULL) {
        if ($fields != NULL) {
            return $this->db->select($fields);
        }

        return $this->db->where(array('user_id' => $id))->get('user')->row();
    }

    public function get_recent() {
        $data = array();
        $temp = $this->db->order_by('article_date', 'DESC')->limit(5)->get($this->_table)->result();

        foreach ($temp as $t) {
            $data[$t->article_id]['user'] = $this->get_author_data($t->user_id, NULL);
            $data[$t->article_id]['content'] = $t;
        }

        return $data;
    }

    public function record_count() {
        return $this->db->count_all($this->_table);
    }

    public function get_articles($fields = NULL, $single = FALSE) {
        if (isset($fields)) {
            $this->db->select($fields);
        }

        if ($single) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        return $this->db->get($this->_table)->$method();
    }

    public function get_articles_by($fields, $where, $single) {
        if (isset($where)) {
            $this->db->where($where);
        }

        return $this->get_articles($fields, $single);
    }

    public function get_all() {
        $query = $this->db->get('article');
        return $query->result();
    }

    public function get_detail($id) {
        $query = $this->db->get_where('article', array('article_id' => $id));
        return $query->result();
    }

    public function get_all_article() {
        $this->db->select('*');
        $this->db->select('a.status as article_status');
        $this->db->from('article as a');
        $this->db->join('user as u', 'a.user_id = u.user_id', 'left');
        $this->db->join('category as c', 'a.category_id = c.category_id', 'left');
        $this->db->order_by('a.article_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_detail_article($id) {
        $this->db->select('*');
        $this->db->select('a.status as article_status');
        $this->db->from('article as a');
        $this->db->join('user as u', 'a.user_id = u.user_id', 'left');
        $this->db->join('category as c', 'a.category_id = c.category_id', 'left');
        $this->db->where('a.article_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_status($id, $stat) {
        $result = $this->get_detail($id);
        $data['status'] = $stat;
        if ($stat == 'approved') {
            $data['approved_date'] = date('Y-m-d H:i:s');
        }
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->update('article', $data, array('article_id' => $id));
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function save($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert('article', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = TRUE;
            }
        } else { //update the profile
            $result = $this->get_detail($id);
            if ($result[0]->article_pic != '') {
                $file_url = './article/' . $result[0]->article_pic;
                $file_url1 = './article/thumbnail' . $result[0]->article_pic;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->where('article_id', $id);
            if ($this->db->update('article', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = FALSE;
            }
        }
        return $data;
    }

    function image_process($image_data, $width, $height, $new_image) {
        $image_config["source_image"] = $image_data["full_path"];
        $image_config['create_thumb'] = FALSE;
        $image_config['maintain_ratio'] = TRUE;
        $image_config['new_image'] = $image_data["file_path"] . 'temp';
        $image_config['quality'] = "100%";
        $image_config['width'] = $width;
        $image_config['height'] = $height;
        $dim = (intval($image_data["image_width"]) / intval($image_data["image_height"])) - ($image_config['width'] / $image_config['height']);
        $image_config['master_dim'] = ($dim > 0) ? "height" : "width";

        $this->load->library('image_lib');
        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();

        $temp_image = $image_data['file_path'] . 'temp/' . $image_data['file_name'];
        list($widths, $heights) = getimagesize($temp_image);
        $diff_y = $heights - $height;
        $diff_x = $widths - $width;
        $y_axis = ($diff_y > 0) ? $diff_y / 2 : 0;
        $x_axis = ($diff_x > 0) ? $diff_x / 2 : 0;
        $image_config['source_image'] = $temp_image;
        $image_config['new_image'] = $new_image;
        $image_config['quality'] = "100%";
        $image_config['maintain_ratio'] = FALSE;
        $image_config['width'] = $width;
        $image_config['height'] = $height;
        $image_config['x_axis'] = strval($x_axis);
        $image_config['y_axis'] = strval($y_axis);
        $this->image_lib->initialize($image_config);

        $this->image_lib->crop();
        unlink($image_data['file_path'] . 'temp/' . $image_data['file_name']);

        $this->image_lib->clear();
    }

    function upload_pic($gallery_path) {
        try {
            $config = array(
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => TRUE,
                'upload_path' => $gallery_path
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('content')) {
                $data = $this->upload->display_errors();
                $image_data = $this->upload->data();
                // proccess thumbnail
                $this->image_process($image_data, 150, 150, $gallery_path . '/thumbnail');
                $this->image_process($image_data, 500, 375, $gallery_path);

                $data['img_name'] = $image_data['file_name'];
                $data['status'] = TRUE;
            } else {
                $data['status'] = FALSE;
                $this->session->set_flashdata('notif', 'File gagal di upload');
            }
        } catch (Exception $e) {
            $data['status'] = FALSE;
            $this->session->set_flashdata('notif', 'File gagal di upload');
        }
        return $data;
    }
	
	
	function toAscii($str, $replace = array(), $delimiter = '_') {
        setlocale(LC_ALL, 'en_US.UTF8');
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean1 = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean2 = strtolower(trim($clean1, '-'));
        $clean3 = preg_replace("/[\/_|+ -]+/", $delimiter, $clean2);

        return $clean3;
    }
	

    public function delete($id) {
        $result = $this->get_detail($id);
        if (count($result) > 0) {
            if ($result[0]->article_pic != '') {
                $file_url = './article/' . $result[0]->article_pic;
                $file_url1 = './article/thumbnail/' . $result[0]->article_pic;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM article WHERE article_id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

}
