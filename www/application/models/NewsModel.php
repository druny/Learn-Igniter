<?php


class NewsModel extends CI_Model
{
    public function allNews() {
        $this->db->limit('1');
        $this->db->order_by('id','random');
        $query = $this->db->get('news');
        return $query->result_array();
    }
}