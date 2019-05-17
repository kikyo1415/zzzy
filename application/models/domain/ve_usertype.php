<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/23
 * Time: 18:06
 * 系统用户类型模型
 */
class ve_usertype extends CI_Model
{
    public $ID;
    public $usertypename;
    public $usertypecode;
    public $isenable;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}