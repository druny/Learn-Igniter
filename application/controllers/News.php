<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function index()
    {
        $page = $this->uri->segment(3);
        $config['base_url'] = base_url() . '/news/index/';
        $config['per_page'] = '3';
        $config['total_rows'] = $this->db->count_all('news');
        $config['use_page_numbers'] = TRUE;
//        var_dump(($this->db->count_all('news')/$config['per_page']));

        $this->pagination->initialize($config);

        $this->load->model('NewsModel');
        $data['news'] = $this->NewsModel->allNews($config['per_page'], $page);

        $this->load->view('news/all', $data);
    }
    public function add()
    {
        if(!empty($_POST)) {
            $config = [
                'upload_path' => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 5000
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);
            $this->upload->do_upload('img');

            $img_data = $this->upload->data();
            $config = [
                'image_library' => 'gd2',
                'source_image' => $img_data['full_path'],
                'new_image' => APPPATH . '../www/uploads/290x290/',
                'create_thumb' => TRUE,
                'maintain_ratio' => TRUE,
                'width' => 290,
                'height' => 290
            ];

            $this->load->library('image_lib');
            $this->image_lib->initialize($config);
            $this->image_lib->resize('img');

            $data['title'] = $_POST['title'];
            $data['text'] = $_POST['text'];
            $data['img'] = $img_data["file_name"];
            $data['category_id'] = $_POST['category_id'];

            $this->load->model('NewsModel');
            $this->NewsModel->addNews($data);
            header('Location: /news/add/');
        } else {
            $this->load->view('news/add');
        }

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
    public function upload_photo()
    {
        if(isset($_POST['send'])) {
           /* $config = [
                'upload_path' => './uploads/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => '5000'
            ];*/
            $config['upload_path']  = __DIR__ ;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5000;
            
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            header('Location: /news/upload_photo');
        } else {
            $this->load->view('news/upload');
        }

    }

    

}