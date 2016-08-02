<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpers extends CI_Controller
{
    
    function captcha()
    {
        $this->benchmark->mark('start');
        session_start();

        if(isset($_POST['captcha'])) {
            $data['captcha'] = $_POST['captcha'];
        }


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
        $this->benchmark->mark('end');
        echo $this->benchmark->elapsed_time('start', 'end');

    }

    function validation() {
        if(!empty($_POST))
        {
            $this->load->library('form_validation');
            $this->load->model('RulesModel');
            $this->form_validation->set_rules($this->RulesModel->add_rules);
            $check = $this->form_validation->run();
            if($check == true)
            {
                $this->load->view('success-page');
            } else {

            }

            
        } else {
            $this->load->view('validation');
        }

    }

    function cache()
    {
        $this->load->driver('cache', ['adapter' => 'apc', 'backup' => 'file']);

        if ( ! $foo = $this->cache->get('foo'))
        {
            echo 'Saving to the cache!<br />';
            $foo = 'foobarbaz!';

            // Save into the cache for 5 minutes
            $this->cache->save('foo', $foo, 30);
        }

        echo $foo;
        $foo = $this->cache->get('foo');
        var_dump($foo);

        var_dump($this->cache->cache_info());

        var_dump($this->cache->get_metadata('foo'));

    }

    function calendar()
    {

        $pref = [
            'start_day' => 'monday',
            'month_type' => 'long',
            'day_type' => 'short',
            'show_next_prev' => TRUE,
            'nex_prev_url' => base_url() . 'helpers/calendar/',
            'show_other_days' => TRUE
        ];
        $this->load->library('calendar', $pref);
        $data = [
            3 => 'http://www.codeigniter.com/user_guide/libraries/calendar.html'
        ];
        echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
        var_dump($this->calendar->adjust_date(130, 2014));
    }


}