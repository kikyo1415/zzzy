<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/23
 * Time: 18:08
 * 经销商模型
 */
class ve_franchiser extends CI_Model
{
    public $ID;
    public $franname;
    public $frantypecode;
    public $parenntfranid;
    public $maxactivatepro;
    public $contacts;
    public $tel;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getallfranchiser()
    {
        $sql = "SELECT ID,franname FROM ve_franchiser";
        $query = $this->db->query($sql);
        $result['state'] = 1;
        foreach ($query->result_array() as $row) {
            $result['data'][] = $row;
        }
        $result['errmsg'] = '';
        return $result;
    }

    //获取所有囤货商
    public function getallstorefran()
    {
        $sql = "SELECT ID,franname FROM ve_franchiser WHERE frantypecode=1";
        $query = $this->db->query($sql);
        $result['state'] = 1;
        foreach ($query->result_array() as $row) {
            $result['data'][] = $row;
        }
        $result['errmsg'] = '';
        return $result;
    }

    public function getfranchiserpagelist($keyword = '', $pagenum = 1, $pagesize = 20)
    {
        try {
            $startindex = ($pagenum - 1) * $pagesize;
            //查询构造
            $this->db
                ->select('t1.ID,t1.franname,t1.frantypecode,t2.typename,t3.franname as parentname,t1.maxactivatepro,t1.contacts,t1.tel')
                ->from('ve_franchiser t1')
                ->join('ve_frantype t2', 't1.frantypecode=t2.typecode', 'left')
                ->join('ve_franchiser t3', 't1.parenntfranid=t3.ID', 'left')
                ->where('t1.isenable',1)
                ->like('t1.franname', $keyword);

            //权限：经销商列表-管理员可获取所有经销商，经销商管理员只能获取所属经销商的直营商
            //故经销商权限增加franchid匹配条件
            if ($this->session->userinfo['usertypecode'] === '1') {
                $this->db->where(array(
                    't1.parenntfranid' => $this->session->userinfo['franchid'],
                    't1.frantypecode' =>2,
                ));
            }
            //计数：总条数
            $totalrows = $this->db->count_all_results('', false);
            //分页：限定每页条数与偏移量
            $this->db->limit($pagesize, $startindex);
            //获取结果
//            $sql = $this->db->get_compiled_select('', false);
            $query = $this->db->get();

            //生成输出返回结果数组
            $result['state'] = 1;
            $result['totalrows'] = $totalrows;
            foreach ($query->result_array() as $row) {
                $result['data'][] = $row;
            }
            $result['errmsg'] = '';
            return $result;
        } catch (Exception $e) {
            $result['state'] = 0;
            $result['data'] = array('affected_rows' => 0);
            $result['errmsg'] = 'exception';
            return $result;
        }

    }

    public function addfranchiser($data)
    {
        try {
            if ($this->db->insert('ve_franchiser', $data)) {
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