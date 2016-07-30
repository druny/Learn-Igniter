<?php


class NewsModel extends CI_Model
{
    public function allNews($num , $page)
    {
        $db_offset = ($page == 0) ? 0 : ($num * $page) - $num;
        $this->db->order_by('id','DESC');
        $this->db->limit($num, $db_offset);

        $query = $this->db->get('news');

        return $query->result_array();
    }
    public function addItems($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function oneNews($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('news');
        return $query->result_array();
    }
    public function updateNews($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
    public function deleteNews($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }
}