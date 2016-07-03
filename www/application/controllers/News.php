<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function  index()
    {
        $this->load->view('news');
    }
    public function about()
    {
        $this->load->model('NewsModel');
        $data['news'] = $this->NewsModel->allNews();
        $this->load->view('about', $data);

    }

}