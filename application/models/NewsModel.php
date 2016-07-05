<?php


class NewsModel extends CI_Model
{
    public function allNews() {
        $this->db->order_by('id','DESC');
        $query = $this->db->get('news');
        return $query->result_array();
    }
    public function addNews($data) {
       
        $this->db->insert('news', $data);

    }
    public function oneNews($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('news');
        return $query->result_array();
    }
}