<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model', 'test');
    }

    public function index()
    {
        $this->mustache->view('mustache/test', ['world' => 'хуец!', 'mustache' => true]);
    }

    //TEST TEST TEST OLOLOLO
    public function test()
    {
        $test['test'] = $this->test->test();
        // echo "<pre>";
        // var_dump($test);die;
        $this->mustache->view('mustache/second', $test);
    }
}