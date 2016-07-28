<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpers extends CI_Controller
{
    
    function captcha()
    {
        session_start();
        $data['captcha'] = $_POST['captcha'];
        if($data['captcha'] == $_SESSION['word'])
        {
            echo 'lol';
        } else {
            echo 'AHAH NOOOO!';
        }
        $this->load->helper('captcha');
        $this->load->helper('string');
        $word = random_string('alnum');

        $vals = array(
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
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        //session_start();
        $_SESSION['word'] = $word;
        $cap = create_captcha($vals);
        echo $cap['image'];
        $this->load->view('helpers');
    }
}