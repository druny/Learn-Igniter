<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpers extends CI_Controller
{
    
    function captcha()
    {
        session_start();
        $data['captcha'] = $_POST['captcha'];

        $this->load->helper('captcha');
        $this->load->helper('string');
        $word = random_string('alnum');

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
        $_SESSION['word'] = $word;
        $cap = create_captcha($vals);
        $captcha = [
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        ];
        $data['cap'] = $cap;
        $this->load->model('NewsModel');
        $this->NewsModel->addItems($captcha, 'captcha');
        $this->load->view('helpers', $data);
    }
}