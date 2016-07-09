<?php


class NewsModel extends CI_Model
{
    public function allNews($num, $offset)
    {
        $this->db->order_by('id','DESC');
        $query = $this->db->get('news',$num, $offset);
        return $query->result_array();
    }
    public function addNews($data)
    {
       
        $this->db->insert('news', $data);

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