<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        session_start();
        if(!empty($_POST)) {
            $data['captcha'] = $_POST['captcha'];
            if($data['captcha'] == $_SESSION['word'])
            {
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
                $this->image_lib->resize();



                $news['title'] = $_POST['title'];
                $news['text'] = $_POST['text'];
                $news['img'] = $img_data["file_name"];
                $news['category_id'] = $_POST['category_id'];

                $this->load->model('NewsModel');
                $this->NewsModel->addItems($news, 'news');
                header('Location: /news/add/');
            } else {
                echo 'AHAH NOOOO!';
                die;
            }
        } else {
            $this->load->helper('captcha');
            $this->load->helper('string');
            $word = random_string('numeric');

            $vals = [
                'word'          => $word,
                'img_path'      => '../www/uploads/captcha/',
                'img_url'       => base_url() . 'uploads/captcha/',
                'font_path'     => './system/fonts/texb.ttf',
                'img_width'     => 175,
                'img_height'    => 30,
                'expiration'    => 200,
                'word_length'   => 5,
                'font_size'     => 22,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                // White background and border, black text and red grid
                'colors'        => [
                    'background' => [255, 255, 255],
                    'border' => [255, 255, 255],
                    'text' => [0, 0, 0],
                    'grid' => [255, 40, 40]
                ]
            ];
            //session_start();
            $_SESSION['word'] = $word;
            $cap = create_captcha($vals);

            $data['cap'] = $cap;
            $this->load->view('news/add', $data);
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