<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/23
 * Time: 17:56
 * 系统用户模型
 */
class ve_user extends CI_Model
{
    public $ID;
    public $username;
    public $userpwd;
    public $usertypecode;
    public $franchid;
    public $usertruename;
    public $isenable;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function validateuserinfo($username, $userpwd)
    {
        try {
            if (
                !isset($username) || empty($username)
                || !isset($userpwd) || empty($userpwd)
            ) {
                $result['state'] = 0;
                $result['data'] = array('loginstate' => 0,);
                $result['errmsg'] = 'username or userpwd is null';
                return $result;
            } else {
                $this->db->where(array(
                    'username' => $username,
                    'userpwd' => $userpwd));
                $this->db->from('ve_user');
                $totalrows = $this->db->count_all_results();
                $result['state'] = 1;
                $result['loginresult'] = array('loginstate' => $totalrows >= 1,);
                $result['errmsg'] = '';
                return $result;
            }
        } catch (Exception $e) {
            $result['state'] = 0;
            $result['data'] = array('loginstate' => 0,);
            $result['errmsg'] = 'exception';
            return $result;
        }
    }


    public function getalluser()
    {
        $sql = "SELECT ID,username FROM ve_user";
        $query = $this->db->query($sql);
        $result['state'] = 1;
        foreach ($query->result_array() as $row) {
            $result['data'][] = $row;
        }
        $result['errmsg'] = '';
        return $result;
    }

    /**
     * 通过ID获取用户信息，用于判断权限。
     * @param $userid
     * @return mixed
     * @throws Exception
     */
    public function getuserinfobyid($userid)
    {
        try {
            $sql = "SELECT t1.username,t2.usertypename,t1.franchid,t1.usertypecode,t4.typename,t3.frantypecode,t3.franname,t1.usertruename FROM ve_user t1 
LEFT JOIN ve_usertype t2 ON t1.usertypecode=t2.usertypecode 
LEFT JOIN ve_franchiser t3 ON t1.franchid=t3.ID 
LEFT JOIN ve_frantype t4 ON t4.typecode=t3.frantypecode 
WHERE  t1.ID='{$userid}'";
            $query = $this->db->query($sql);
            if ($query) {
                $result['state'] = 1;
                $result['data'] = $query->row_array();
            } else {
                $result['state'] = 0;
                $result['errmsg'] = '数据库获取失败';
            }
            return $result;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    public function getuserinfobyusername($username)
    {
        try {
            $sql = "SELECT t1.username,t2.usertypename,t1.franchid,t1.usertypecode,t4.typename,t3.frantypecode,t3.franname,t1.usertruename FROM ve_user t1 
LEFT JOIN ve_usertype t2 ON t1.usertypecode=t2.usertypecode 
LEFT JOIN ve_franchiser t3 ON t1.franchid=t3.ID 
LEFT JOIN ve_frantype t4 ON t4.typecode=t3.frantypecode 
WHERE  t1.username='{$username}'";
            $query = $this->db->query($sql);
            if ($query) {
                $result['state'] = 1;
                $result['data'] = $query->row_array();
            } else {
                $result['state'] = 0;
                $result['errmsg'] = '数据库获取失败';
            }
            return $result;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    public function getuser($k, $v)
    {
        try {
            $query = $this->db->select('*')->from('ve_user')->where($k, $v)
                ->get();
            if ($query) {
                $result['state'] = 1;
                foreach ($query->result_array() as $row) {
                    $result['data'][] = $row;
                }
            } else {
                $result['state'] = 0;
                $result['errmsg'] = '数据库获取失败';
            }
            return $result;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    public function getuserpagelist($keyword = '', $pagenum = 1, $pagesize = 20)
    {
        try {
            $startindex = ($pagenum - 1) * $pagesize;
            //查询构造
            $this->db
                ->select('t1.username,t3.franname,t2.usertypename,t1.usertruename')
                ->from('ve_user t1')
                ->join('ve_usertype t2', ' t1.usertypecode=t2.usertypecode', 'left')
                ->join('ve_franchiser t3', 't1.franchid=t3.ID', 'left')
                ->where('t1.isenable',1)
                ->like(' t1.username', $keyword);

            //权限：用户列表-管理员可获取所有用户，经销商管理员只能获取所属经销商的用户
            //故经销商权限增加franchid匹配条件
            if($this->session->userinfo['usertypecode']==='1'){
                $this->db->where('t1.franchid', $this->session->userinfo['franchid']);
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

    public function adduser($data)
    {
        try {
            if ($this->db->insert('ve_user', $data)) {
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