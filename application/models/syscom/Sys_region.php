<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/21
 * Time: 12:21
 * 客户地址模型（至街道）
 */
class Sys_region extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getprovince()
    {
        $query = $this->db->query('SELECT DISTINCT province FROM sys_region;');
        $result['state'] = 1;
        $result['data'] = $query->row_array();
        $result['errmsg'] = '';
        return $result;
    }

    public function getcities()
    {
        try {
            $query = $this->db->query('SELECT DISTINCT city FROM sys_region;');
            if ($query) {
                $result['state'] = 1;
                foreach ($query->result_array() as $row) {
                    $result['data'][] = $row;
//            $result['data'][]=$row['city'];
                }
                $result['errmsg'] = '';
                return $result;
            } else {
                $error = $this->db->error();
                $result['state'] = 0;
                $result['data'] = array('affected_rows' => 0);
                $result['errmsg'] = '数据库命令执行失败';
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

    public
    function getareaes($city)
    {
        try {
            $query = $this->db->query("SELECT DISTINCT area FROM sys_region where city='{$city}';");
            if ($query) {
                $result['state'] = 1;
                foreach ($query->result_array() as $row) {
                    $result['data'][] = $row;
//            $result['data'][]=$row['area'];
                }
                $result['errmsg'] = '';
                return $result;
            } else {
                $error = $this->db->error();
                $result['state'] = 0;
                $result['data'] = array('affected_rows' => 0);
                $result['errmsg'] = '数据库命令执行失败';
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

    public
    function getstreets($city, $area)
    {
        try {
            $query = $this->db->query("SELECT ID, street FROM sys_region where city='{$city}' and area='{$area}';");
            if ($query) {
                $result['state'] = 1;
                foreach ($query->result_array() as $row) {
                    $result['data'][] = $row;
//            $result['data'][]=$row['street'];
                }
//        $result['data']=$query->row_array();
                $result['errmsg'] = '';
                return $result;
            } else {
                $error = $this->db->error();
                $result['state'] = 0;
                $result['data'] = array('affected_rows' => 0);
                $result['errmsg'] = '数据库命令执行失败';
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