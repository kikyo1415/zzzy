<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/9/18
 * Time: 20:14
 */
class pages extends CI_Controller
{
    //全局：每页数据显示条数。
    private $global_per_page;
    //全局：分页设置。
    private $global_page_config;

    private $loginuri;

    public function __construct()
    {
        parent::__construct();
        $this->global_per_page = 2;
        $this->load->helper('url');
        $this->load->model('syscom/sys_competence');
        $this->load->model('domain/ve_franchiser');
        $this->load->model('domain/ve_user');
        $this->load->model('domain/ve_project');
        $this->load->model('domain/ros_site');
        $this->load->library('pagination');
        $this->load->library('session');

        $this->global_page_config['per_page'] = $this->global_per_page;
        $this->global_page_config['use_page_numbers'] = TRUE;
        $this->global_page_config['first_link'] = '首页';
        $this->global_page_config['last_link'] = '末页';
        $this->global_page_config['next_link'] = '下一页';
        $this->global_page_config['prev_link'] = '上一页';
//        $this->global_page_config['enable_query_strings'] = TRUE;
//        $this->global_page_config['page_query_string'] = TRUE;
        $this->global_page_config['use_global_url_suffix'] = FALSE;
        $this->global_page_config['query_string_segment'] = '$pagenum';
        $this->global_page_config['uri_segment'] = 3;

        $this->loginuri = 'pages/login';
        $currenturi = uri_string();
//        if ($currenturi != $this->loginuri && (!isset($this->session->userinfo) || empty($this->session->userinfo))) {
//            redirect($this->loginuri);
//        }
    }

    public function index()
    {
        $this->showpage('pages/contentdemo_index.php');
    }

    public function login()
    {
        $data['domaincss'] = array('resource/css/domain/toastr.css');
        $data['domainscripts'] = array(
            'resource/js/domain/toastr.min.js',
            'resource/js/domain/login.js');
        $data["baseserviceurl"] = base_url() . "services/login/loginservice";
        $this->load->view('pages/login.php', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('userinfo');
        redirect($this->loginuri);
    }


    public function adduser()
    {
        $css = array(
            'resource/jsframework/vendors/pnotify/dist/pnotify.css',
            'resource/jsframework/vendors/pnotify/dist/pnotify.buttons.css',
            'resource/jsframework/vendors/pnotify/dist/pnotify.nonblock.css',
            'resource/css/domain/toastr.css'
        );
        $scripts = array(
            'resource/jsframework/vendors/validator/validator.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.buttons.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.nonblock.js',
            'resource/js/domain/toastr.min.js',
            'resource/js/domain/adduser.js'
        );
        $data["baseserviceurl"] = base_url() . "services/sysuser/userservice";
        $data["franchiserserviceurl"] = base_url() . "services/franchiser/franchiservice";
        $this->showpage('pages/adduser.php', $data, $css, $scripts);
    }


    public function userlist($pagenum = 1, $keyword = '')
    {
        $pagedataconfig = $this->global_page_config;
        $pagedataconfig['base_url'] = base_url() . 'pages/userlist';
        $k = substr($keyword, 2);
        $pagedataconfig['suffix'] = '/k-' . $k;
        $pagedataconfig['first_url'] = $pagedataconfig['base_url'] . '/1/k-' . $k;

        $pagelist = $this->ve_user->getuserpagelist($k, $pagenum, $this->global_per_page);
        $pagedataconfig['total_rows'] = $pagelist['totalrows'];

        $this->pagination->initialize($pagedataconfig);
        $datapagecontrol = $this->pagination->create_links();

        $css = array(
            'resource/css/domain/vepage.css',
            'resource/css/domain/ve_table_global.css');
        $scripts = array('resource/js/domain/userlist.js');
//        $pagedata['pagedescription'] = ($this->session->userinfo['franname'] ?: '所有') . '用户';
        $pagedata['listdescription'] = '';
        $pagedata['datapagelist'] = $pagelist['data'];
        $pagedata['datapagecontrol'] = $datapagecontrol;
        $pagedata['currentbase_url'] = base_url() . 'pages/userlist';
        $pagedata['keyword'] = $k;
        $this->showpage('pages/userlist.php', $pagedata, $css, $scripts);
    }

    public function addfranchiser()
    {
        $css = array(
            'resource/jsframework/vendors/pnotify/dist/pnotify.css',
            'resource/jsframework/vendors/pnotify/dist/pnotify.buttons.css',
            'resource/jsframework/vendors/pnotify/dist/pnotify.nonblock.css',
            'resource/css/domain/toastr.css'
        );
        $scripts = array(
            'resource/jsframework/vendors/validator/validator.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.buttons.js',
            'resource/jsframework/vendors/pnotify/dist/pnotify.nonblock.js',
            'resource/js/domain/toastr.min.js',
            'resource/js/domain/addfranchiser.js'
        );

        $data["baseserviceurl"] = base_url() . "services/franchiser/franchiservice";
        $this->showpage('pages/addfranchiser.php', $data, $css, $scripts);
    }


    public function franchiserlist($pagenum = 1, $keyword = '')
    {
        $pagedataconfig = $this->global_page_config;
        $pagedataconfig['base_url'] = base_url() . 'pages/franchiserlist';
        $k = substr($keyword, 2);
        $pagedataconfig['suffix'] = '/k-' . $k;
        $pagedataconfig['first_url'] = $pagedataconfig['base_url'] . '/1/k-' . $k;

        $pagelist = $this->ve_franchiser->getfranchiserpagelist($k, $pagenum, $this->global_per_page);
        $pagedataconfig['total_rows'] = $pagelist['totalrows'];

        $this->pagination->initialize($pagedataconfig);
        $datapagecontrol = $this->pagination->create_links();

        $css = array(
            'resource/css/domain/vepage.css',
            'resource/css/domain/ve_table_global.css');
        $scripts = array('resource/js/domain/franchiserlist.js');
//        $pagedata['pagedescription'] = (!isset($this->session->userinfo['franname']) || empty($this->session->userinfo['franname']))
//            ? '所有经销商'
//            : '所有下辖直营商';
        $pagedata['listdescription'] = '';
        $pagedata['datapagelist'] = $pagelist['data'];
        $pagedata['datapagecontrol'] = $datapagecontrol;
        $pagedata['currentbase_url'] = base_url() . 'pages/franchiserlist';
        $pagedata['keyword'] = $k;
        $this->showpage('pages/franchiserlist.php', $pagedata, $css, $scripts);
    }

    public function activeprojectlist($pagenum = 1, $keyword = '')
    {
        $pagedataconfig = $this->global_page_config;
        $pagedataconfig['base_url'] = base_url() . 'pages/activeprojectlist';
        $k = substr($keyword, 2);
        $pagedataconfig['suffix'] = '/k-' . $k;
        $pagedataconfig['first_url'] = $pagedataconfig['base_url'] . '/1/k-' . $k;

        $pagelist = $this->ve_project->get_activeproject_pagelist($k, $pagenum, $this->global_per_page);
        $pagedataconfig['total_rows'] = $pagelist['totalrows'];

        $this->pagination->initialize($pagedataconfig);
        $datapagecontrol = $this->pagination->create_links();
        $css = array(
            'resource/css/domain/vepage.css',
            'resource/css/domain/toastr.css',
            'resource/css/domain/ve_table_global.css');
        $scripts = array('resource/js/domain/projectlist.js', 'resource/js/domain/toastr.min.js');

        $pagedata['pagedescription'] = '当前激活项目';
        $pagedata['listdescription'] = '本账号当前已经录入并激活的项目';
        $pagedata['datapagelist'] = $pagelist['data'];
        $pagedata['datapagecontrol'] = $datapagecontrol;
        $pagedata['currentbase_url'] = base_url() . 'pages/activeprojectlist';
        $pagedata["serviceurl"] = base_url() . "services/project/projectservices";
        $pagedata['keyword'] = $k;
        $this->showpage('pages/activeprojectlist.php', $pagedata, $css, $scripts);
    }

    public function projectlist($pagenum = 1, $keyword = '')
    {
        $pagedataconfig = $this->global_page_config;
        $pagedataconfig['base_url'] = base_url() . 'pages/projectlist';
        $k = substr($keyword, 2);
        $pagedataconfig['suffix'] = '/k-' . $k;
        $pagedataconfig['first_url'] = $pagedataconfig['base_url'] . '/1/k-' . $k;

        $pagelist = $this->ve_project->get_allproject_pagelist($k, $pagenum, $this->global_per_page);
        $pagedataconfig['total_rows'] = $pagelist['totalrows'];

        $this->pagination->initialize($pagedataconfig);
        $datapagecontrol = $this->pagination->create_links();
        $css = array(
            'resource/css/domain/vepage.css',
            'resource/css/domain/ve_table_global.css',
            'resource/css/domain/toastr.css',
            'resource/jsframework/vendors/iCheck/skins/flat/green.css');
        $scripts = array(
            'resource/js/domain/projectlist.js',
            'resource/js/domain/toastr.min.js',
            'resource/jsframework/vendors/starrr/dist/starrr.js');

        $pagedata['pagedescription'] = '所有项目';
        $pagedata['listdescription'] = '本账号及子级经销商当前已经录入的所有项目';
        $pagedata['datapagelist'] = $pagelist['data'];
        $pagedata['datapagecontrol'] = $datapagecontrol;
        $pagedata['currentbase_url'] = base_url() . 'pages/projectlist';
        $pagedata["serviceurl"] = base_url() . "services/project/projectservices";
        $pagedata['keyword'] = $k;
        $this->showpage('pages/projectlist.php', $pagedata, $css, $scripts);
    }

    public function projectdetail()
    {
        $css = array('resource/jsframework/vendors/iCheck/skins/flat/green.css');
        $pagedata['pagedescription'] = '所有项目';
        $pagedata['listdescription'] = '本账号当前已经录入的所有项目';
        $this->showpage('pages/projectdetail.php', $pagedata, $css);
    }

    public function entryproject()
    {
        $css = array(
            'resource/css/domain/toastr.css'
        );
        $scripts = array(
            'resource/jsframework/vendors/validator/validator.js',
            'resource/js/domain/regioninfo.js',
            'resource/js/domain/toastr.min.js',
            'resource/js/domain/entryproject.js'
        );
        $data["baseserviceurl"] = base_url() . "services/project/projectservices";
        $this->showpage('pages/entryproject.php', $data, $css, $scripts);
    }

    public function addsite()
    {
        $css = array(
            'resource/css/domain/toastr.css'
        );
        $scripts = array(
            'resource/jsframework/vendors/validator/validator.js',
            'resource/js/domain/toastr.min.js',
            'resource/js/domain/addsite.js',
        );
        $data["baseserviceurl"] = base_url() . "services/site/siteservices";
        $data['cover'] = $this->ros_site->get_all_covertype();
        $data['sitetype'] = $this->ros_site->get_all_sitetype();
        $data['sitelevel'] = $this->ros_site->get_all_sitelevel();
        $data['sitepr'] = $this->ros_site->get_all_sitepr();
        $data['powertype'] = $this->ros_site->get_all_powertype();
        $data['branchcom'] = $this->ros_site->get_all_branchcom();
        $data['area'] = $this->ros_site->get_all_area();

        $this->showpage('pages/addsite.php', $data, $css, $scripts);
    }

    public function sitelist()
    {
        $css = array(
            'resource/jsframework/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
            'resource/jsframework/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
            'resource/jsframework/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
            'resource/jsframework/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
            'resource/jsframework/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
            'resource/css/domain/ros_table_global.css'
        );
        $scripts = array(
            'resource/jsframework/vendors/datatables.net/js/jquery.dataTables.min.js',
            'resource/jsframework/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            'resource/jsframework/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.print.min.js',
            'resource/jsframework/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            'resource/jsframework/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            'resource/jsframework/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            'resource/jsframework/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            'resource/jsframework/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            'resource/jsframework/vendors/jszip/dist/jszip.min.js',
            'resource/jsframework/vendors/pdfmake/build/pdfmake.min.js',
            'resource/jsframework/vendors/pdfmake/build/vfs_fonts.js',
            'resource/js/domain/sitelist.js');//先加载框架，后加载domain

        $pagelist = $this->ros_site->get_site_many();
        $pagedata['listdescription'] = '';
        $pagedata['datapagelist'] = $pagelist['data'];
        $this->showpage('pages/sitelist.php', $pagedata, $css, $scripts);
    }


    public function sitedetail($siteid)
    {
        $css = array('resource/css/domain/ros_sitedetail.css');
        $script = array(
            'resource/jsframework/vendors/datatables.net/js/jquery.dataTables.min.js',
            'resource/jsframework/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            'resource/jsframework/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            'resource/jsframework/vendors/datatables.net-buttons/js/buttons.print.min.js',
            'resource/jsframework/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            'resource/jsframework/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            'resource/jsframework/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            'resource/jsframework/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            'resource/jsframework/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            'resource/jsframework/vendors/jszip/dist/jszip.min.js',
            'resource/jsframework/vendors/pdfmake/build/pdfmake.min.js',
            'resource/jsframework/vendors/pdfmake/build/vfs_fonts.js',
            'resource/js/domain/sitedetail.js',);
        $pagedata["serviceurl"] = base_url() . "services/site/siteservices";
        $sitedetail = $this->ros_site->get_site_detail($siteid);
        $pagedata["sitedetail"] = $sitedetail;
        $this->showpage('pages/sitedetail.php', $pagedata, $css, $script);
    }

    public function systemsetting()
    {

    }


    private function showpage($pagepath, $pagedata = '', $pagecss = array(), $pagescript = array())
    {
        $data['domaincss'] = $pagecss;
        $data['domainscripts'] = $pagescript;

        //根据当前用户权限获取左部菜单页面名称
        $currentusermenu = $this->sys_competence->getcurrentusermenu();
        $menudata['userinfo'] = $this->session->userinfo;//菜单：注入用户信息
        $data['pagemenu'] = $this->load->view('pages/sidebarmenu/' . $currentusermenu . '.php', $menudata, true);

        //页面内容
        $data['pagecontent'] = $this->load->view($pagepath, $pagedata, true);
        $data['userinfo'] = $this->session->userinfo;//main框架页面：注入用户信息
        $this->load->view('pages/mainpage.php', $data);
    }
}