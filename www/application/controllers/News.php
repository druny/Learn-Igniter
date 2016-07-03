<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function  index()
    {
        $this->load->model('NewsModel');
        $data['news'] = $this->NewsModel->allNews();
        $this->load->view('news/all', $data);
    }
    public function add()
    {
        $this->load->view('news/add');
    }
    

}