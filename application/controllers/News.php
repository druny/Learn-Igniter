<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function index()
    {
        $config['base_url'] = base_url() . '/news/index/';
        $config['total_rows'] = $this->db->count_all('news');
        $config['per_page'] = '2';

        $this->pagination->initialize($config);

        $this->load->model('NewsModel');
        $data['news'] = $this->NewsModel->allNews($config['per_page'],
                                            $this->uri->segment(3));
        $this->load->view('news/all', $data);
    }
    public function add()
    {
        if(!empty($_POST)) {
            header('Location: /news/add/');
        }
        if(!empty($_POST)) {
            $data['title'] = $_POST['title'];
            $data['text'] = $_POST['text'];
            $data['category_id'] = $_POST['category_id'];
            $this->load->model('NewsModel');
            $this->NewsModel->addNews($data);
        }
        $this->load->view('news/add');
    }
    public function one($id)
    {
        if(isset($id) && !empty($id)) {
            $this->load->model('NewsModel');
            $data['news'] = $this->NewsModel->oneNews($id);
        }
        $this->load->view('news/one', $data);
    }
    function update($id)
    {
        $this->load->model('NewsModel');

        if(!empty($_POST)) {
            $data['title'] = $_POST['title'];
            $data['text'] = $_POST['text'];
            $this->NewsModel->updateNews($data, $id);

            header('Location: /news/Update/' . $id);
        }

        $data['news'] = $this->NewsModel->oneNews($id);
        $this->load->view('news/update', $data);
    }
    function del($id) {

        if(isset($id) && !empty($id)) {
            $this->load->model('NewsModel');
            $result = $this->NewsModel->deleteNews($id);
        }
        header('Location: /news/');
    }

    

}