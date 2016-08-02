<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RulesModel extends CI_Controller {
    public $add_rules =[
        [
            'field' => 'title',
            'label' => 'Заголовок',
            'rules' => 'required|xss_clean|min_length[5]|max_length[50]|trim'
        ],
        [
            'field' => 'text',
            'label' => 'Текст',
            'rules' => 'required|xss_clean|min_length[10]|max_length[5000]|trim'
        ]
    ];

}