<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/24
 * Time: 9:54
 * 经销商管理服务
 */
class franchiservice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('domain/ve_franchiser');
        $this->load->library('ve_comfunc');
    }


    public  function getallstorefran(){
        $result= $this->ve_franchiser->getallstorefran();
        $this->outputjson($result);
    }

    public  function getallfranchiser(){
        $result= $this->ve_franchiser->getallfranchiser();
        $this->outputjson($result);
    }

    public  function addfranchiser(){
        $franchiserinfo = $this->input->post('franchiserinfo');
        $franchiserinfo['ID']=$this->ve_comfunc->create_uuid();
        $result= $this->ve_franchiser->addfranchiser($franchiserinfo);
        $this->outputjson($result);
    }

    private function outputjson($jsondata){
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jsondata,JSON_UNESCAPED_UNICODE));
    }
}