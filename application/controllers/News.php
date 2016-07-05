<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function index()
    {
        $this->load->model('NewsModel');
        $data['news'] = $this->NewsModel->allNews();
        $this->load->view('news/all', $data);
    }
    public function add()
    {
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $data['category_id'] = $_POST['category_id'];

        $this->load->model('NewsModel');
        $this->NewsModel->addNews($data);

        $this->load->view('news/add');
    }


    

}