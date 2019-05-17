<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/11/4
 * Time: 11:34
 */
class datezoneshow extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

    public function index()
    {
        $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
        $time = now('PRC');
//        echo mdate($datestring, $time);
        echo date('Y-m-d H:i:s', now());
    }
}