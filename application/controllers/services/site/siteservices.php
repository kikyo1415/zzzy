<?php

/**
 * Created by PhpStorm.
 * User: CHIBM
 * Date: 2018/12/26
 * Time: 12:08
 */
class siteservices extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('domain/ros_site');
        $this->load->library('ve_comfunc');
        $this->load->helper('date');
    }

    public function addsite()
    {
        $siteinfo = $this->input->post('siteinfo');
        $siteinfo['ID'] = $this->ve_comfunc->create_uuid();
        $result = $this->ros_site->add_site($siteinfo);
        $this->output->outputjson($result);
    }

    public function addrentcontract()
    {
        $contractinfo = $this->input->post('contractinfo');
        $contractinfo['ID'] = $this->ve_comfunc->create_uuid();
        $result = $this->ros_site->add_site_rentcontract($contractinfo);
        $this->output->outputjson($result);
    }


    public function getallsites($predicateinput)
    {

    }


}