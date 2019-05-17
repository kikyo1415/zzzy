<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/24
 * Time: 19:34
 * 用户管理服务
 */
class userservice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('domain/ve_user');
        $this->load->library('ve_comfunc');

    }

    public  function getalluser(){
        $result= $this->ve_user->getalluser();
        $this->outputjson($result);
    }

    public  function adduser(){
        $userinfo = $this->input->post('userinfo');
        $userinfo['ID']=$this->ve_comfunc->create_uuid();
        $userinfo['usertypecode']=1;
        $userinfo['isenable']=1;
        $result= $this->ve_user->adduser($userinfo);
        $this->outputjson($result);
    }

    private function outputjson($jsondata){
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jsondata,JSON_UNESCAPED_UNICODE));
    }
}