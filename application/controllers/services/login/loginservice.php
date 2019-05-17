<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/29
 * Time: 22:56
 */
class loginservice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('domain/ve_user');
        $this->load->library('session');
    }

    public function validatelogin()
    {
        $logininfo = $this->input->post('logininfo');
        $result = $this->ve_user->validateuserinfo($logininfo['lg-username'], $logininfo['lg-userpwd']);
        if ($result["loginresult"]["loginstate"] == 1) {
            $userinforestlt = $this->ve_user->getuserinfobyusername($logininfo['lg-username']);
            $this->session->userinfo = $userinforestlt['data'];
        }
        $this->outputjson($result);
    }

    private function outputjson($jsondata)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jsondata, JSON_UNESCAPED_UNICODE));
    }

}