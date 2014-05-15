<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Category_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('category');
        return $query->result();
    }

    public function get_detail($id) {
        $query = $this->db->get_where('category', array('category_id' => $id));
        return $query->row();
    }
	
	public function get_category_drop(){
		$category = $this->get_all();
			$res[''] = '== Pilih Kategori ==';
		foreach ($category as $row){
			$res[$row->category_id] = $row->category_name;
		}
		return $res;
	}

    public function save($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert('category', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = FALSE;
            }
        } else { //update the profile
            $this->db->where('category_id', $id);
            if ($this->db->update('category', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = FALSE;
            }
        }
        return $data;
    }

    public function delete($id) {
        $result = $this->get_detail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM category WHERE category_id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

}
