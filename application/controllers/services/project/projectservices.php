<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/21
 * Time: 11:31
 * 项目管理服务
 */
class projectservices extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('syscom/sys_region');
        $this->load->model('domain/ve_project');
        $this->load->model('domain/ve_channel');
//        $this->load->model('domain/ve_entryrecord');
        $this->load->library('ve_comfunc');
        $this->load->helper('date');
    }

    public function entryproject()
    {
        $projectinfo = $this->input->post('projectinfo');
        $result = $this->ve_project->entryproject($projectinfo);
        $this->outputjson($result);
    }

    public function signbill(){
        $proid= $this->input->post('proid');
        $result = $this->ve_project->signbill($proid);
        $this->outputjson($result);
    }

    public function getprovince()
    {
        $result = $this->sys_region->getprovince();
        $this->outputjson($result);
    }

    public function getcities()
    {

        $result = $this->sys_region->getcities();
        $this->outputjson($result);
    }

    public function getareaes()
    {
        $cityname = $this->input->post('city');
        $result = $this->sys_region->getareaes($cityname);
        $this->outputjson($result);
    }

    public function getstreets()
    {
        $cityname = $this->input->post('city');
        $areaname = $this->input->post('area');
        $result = $this->sys_region->getstreets($cityname, $areaname);
        $this->outputjson($result);
    }

    public function getchannels()
    {
        $result = $this->ve_channel->getchannels();
        $this->outputjson($result);
    }

    private function outputjson($jsondata)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jsondata, JSON_UNESCAPED_UNICODE));
    }
}