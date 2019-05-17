<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/11/3
 * Time: 13:14
 * 项目录入记录模型(针对后台运营者)
 */
class ve_entryrecord extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function addrecord($data){
        try {
            if ($this->db->insert('ve_entryrecord', $data)) {
                $affected_rows = $this->db->affected_rows();
                $error = $this->db->error();
                $result['state'] = 1;
                $result['data'] = array('affected_rows' => $affected_rows);
                $result['errmsg'] = '';
            } else {
                $error = $this->db->error();
                $result['state'] = 0;
                $result['data'] = array('affected_rows' => 0);
                $result['errmsg'] = '数据库插入失败';
//            $result['errorcode']=$error ;
            }
            return $result;
        } catch (Exception $e) {
            $result['state'] = 0;
            $result['data'] = array('affected_rows' => 0);
            $result['errmsg'] = 'exception';
            return $result;
        }
    }
}