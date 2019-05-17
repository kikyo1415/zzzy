<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/11/3
 * Time: 13:14
 * 项目信息模型（针对经销商）
 */
class ve_project extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('ve_comfunc');
        $this->load->helper('date');
    }

    /**
     * 录入项目（带生成记录）
     * @param $projectinfo 项目数据信息
     * @return mixed 执行结果
     */
    public function entryproject($projectinfo)
    {
        try {
            if (!isset($projectinfo) || empty($projectinfo)
            ) {
                $result['state'] = 0;
                $result['data'] = array('affected_rows' => 0);
                $result['errmsg'] = 'data is null';
                return $result;
            } else {
                $projectinfo['ID'] = $this->ve_comfunc->create_uuid();
                $projectinfo['prostatuscode'] = 1;//项目新增时项目状态为【进行中】
                $projectinfo['createtime'] = date('Y-m-d H:i:s', now());

                $recordtinfo['ID'] = $this->ve_comfunc->create_uuid();
                $recordtinfo['franid'] = $this->session->userinfo['franchid'];
                $recordtinfo['proname'] = $projectinfo['proname'];
                $recordtinfo['offeramount'] = $projectinfo['amount'];
                $recordtinfo['prostatuscode'] = $projectinfo['prostatuscode'];
                $recordtinfo['channelcode'] = $projectinfo['channelcode'];
                $recordtinfo['customer'] = $projectinfo['customer'];
                $recordtinfo['customertel'] = $projectinfo['customertel'];
                $recordtinfo['remark'] = $projectinfo['remark'];
//                $recordtinfo['entrytypecode'] = 1;
                $recordtinfo['entrytime'] = $projectinfo['createtime'];

                $this->db->trans_begin();
                if (!$this->validate_project_isexist($projectinfo)) {
                    $recordtinfo['entrytypecode'] = 1;//初次录入
                    $recordtinfo['projectid'] = $projectinfo['ID'];
                    $this->db->insert('ve_project', $projectinfo);
                } else {
                    $existprojectresult = $this->get_existproject_byaddress($projectinfo);
                    $existproject = $existprojectresult['data'][0];
                    $recordtinfo['entrytypecode'] =
                        $this->validate_isfirstrecord($existproject['ID'], $this->session->userinfo['franchid'])
                            ? 1 : 2;//判断是初次还是更新
                    $recordtinfo['projectid'] = $existproject['ID'];
                }


                $this->db->insert('ve_entryrecord', $recordtinfo);
//                $sql1 = $this->db->set($projectdata)->get_compiled_insert('ve_project');
//                $sql2 = $this->db->set($recorddata)->get_compiled_insert('ve_entryrecord');
//                $this->db->query($sql1);
//                $this->db->query($sql2);
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $error = $this->db->error();
                    $result['state'] = 0;
                    $result['data'] = array('affected_rows' => 0);
                    $result['errmsg'] = '数据库插入失败';
//            $result['errorcode']=$error ;
                } else {
                    $this->db->trans_commit();
                    $affected_rows = $this->db->affected_rows();
                    $error = $this->db->error();
                    $result['state'] = 1;
                    $result['data'] = array('affected_rows' => $affected_rows);
                    $result['errmsg'] = '';
                }
                return $result;
            }
        } catch (Exception $e) {
            $result['state'] = 0;
            $result['data'] = array('affected_rows' => 0);
            $result['errmsg'] = 'exception';
            return $result;
        }
    }

    /**
     *获取项目分页列表（激活项目）。
     */
    public function get_activeproject_pagelist($keyword = '', $pagenum = 1, $pagesize = 20)
    {
        try {
            $startindex = ($pagenum - 1) * $pagesize;
            //查询构造
            $this->db
                ->select('ve_project.ID,
                                ve_entryrecord.proname,
                                sys_region.fullname,
                                ve_project.addresscode2,
                                ve_entryrecord.offeramount,
                                ve_project.prostatuscode,
                                ve_prostatus.statusname,
                                ve_channel.channelname,
                                ve_entryrecord.customer,
                                ve_entryrecord.customertel,
                                ve_entryrecord.remark,
                                ve_entryrecord.entrytime')
                ->from('ve_project')
                ->join('ve_entryrecord', 've_entryrecord.projectid = ve_project.ID')
                ->join('ve_prostatus', 've_prostatus.statuscode = ve_project.prostatuscode')
                ->join('ve_channel', 've_channel.channelcode = ve_project.channelcode')
                ->join('sys_region', 'sys_region.ID = ve_project.addresscode1')
                ->where($this->get_activeprojectlist_predicate_arr())
                ->like(' ve_entryrecord.proname', $keyword);

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

    /**
     *获取项目分页列表（全部项目）。
     */
    public function get_allproject_pagelist($keyword = '', $pagenum = 1, $pagesize = 20)
    {
        try {
            $startindex = ($pagenum - 1) * $pagesize;
            //查询构造
            $this->db
                ->select('ve_project.ID,
                                ve_entryrecord.proname,
                                sys_region.fullname,
                                ve_project.addresscode2,
                                ve_entryrecord.offeramount,
                                ve_project.prostatuscode,
                                ve_prostatus.statusname,
                                ve_channel.channelname,
                                ve_entryrecord.customer,
                                ve_entryrecord.customertel,
                                ve_entryrecord.remark,
                                ve_entryrecord.entrytime')
                ->from('ve_project')
                ->join('ve_entryrecord', 've_entryrecord.projectid = ve_project.ID')
                ->join('ve_prostatus', 've_prostatus.statuscode = ve_project.prostatuscode')
                ->join('ve_channel', 've_channel.channelcode = ve_project.channelcode')
                ->join('sys_region', 'sys_region.ID = ve_project.addresscode1')
                ->where($this->get_allprojectlist_predicate_arr())
                ->like('ve_entryrecord.proname', $keyword);

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

    private function validate_project_isexist($projectinfo)
    {
        $rowcount = $this->db
            ->where($this->get_project_repeatpredicate_arr($projectinfo))
            ->count_all_results('ve_project');
        return $rowcount >= 1;
    }

    private function validate_isfirstrecord($projectid, $franchid)
    {
        $rowcount = $this->db->where('projectid', $projectid)
            ->where('franid', $franchid)
            ->count_all_results('ve_entryrecord');
        return $rowcount < 1;
    }

    private function get_existproject_byaddress($projectinfo)
    {
        try {
            $query = $this->db->select('*')
                ->from('ve_project')
                ->where($this->get_project_repeatpredicate_arr($projectinfo))
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

    private function get_project_repeatpredicate_arr($projectinfo)
    {
        return array(
            'addresscode1' => $projectinfo['addresscode1'],
            'addresscode2' => $projectinfo['addresscode2']);
    }

    private function getrecord($k, $v)
    {
        try {
            $query = $this->db->select('*')->from('ve_entryrecord')->where($k, $v)
                ->get();
            if ($query) {
                return $query->result_array();
            } else {
                return array();
            }
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    private function getproject($k, $v)
    {
        try {
            $query = $this->db->select('*')->from('ve_project')->where($k, $v)
                ->get();
            if ($query) {
                return $query->result_array();
            } else {
                return array();
            }
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    public function signbill($proid)
    {
        $projectinfo = $this->getproject('ID', $proid)[0];
        $recordtinfo['ID'] = $this->ve_comfunc->create_uuid();
        $recordtinfo['franid'] = $this->session->userinfo['franchid'];
        $recordtinfo['proname'] = $projectinfo['proname'];
        $recordtinfo['offeramount'] = $projectinfo['amount'];

        $recordtinfo['channelcode'] = $projectinfo['channelcode'];
        $recordtinfo['customer'] = $projectinfo['customer'];
        $recordtinfo['customertel'] = $projectinfo['customertel'];
        $recordtinfo['remark'] = $projectinfo['remark'];
        $recordtinfo['entrytime'] = $projectinfo['createtime'];
        $recordtinfo['projectid'] = $projectinfo['ID'];
        $recordtinfo['prostatuscode'] = 2;//项目状态改为签单
        $recordtinfo['entrytypecode'] = 3;//操作记录设置为签单

        $this->db->trans_begin();
        $update_data = array(
            'prostatuscode' => 2//项目状态改为签单
        );
        $this->db->where('ID', $proid);
        $this->db->update('ve_project', $update_data);
        $this->db->insert('ve_entryrecord', $recordtinfo);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $error = $this->db->error();
            $result['state'] = 0;
            $result['data'] = array('affected_rows' => 0);
            $result['errmsg'] = '数据库插入失败';
//            $result['errorcode']=$error ;
        } else {
            $this->db->trans_commit();
            $affected_rows = $this->db->affected_rows();
            $error = $this->db->error();
            $result['state'] = 1;
            $result['data'] = array('affected_rows' => $affected_rows);
            $result['errmsg'] = '';
        }
        return $result;


    }

    private function get_activeprojectlist_predicate_arr()
    {
        $result_arr['ve_entryrecord.entrytypecode'] = 1;//唯一限定，只将首次录入时的记录返回显示
        $result_arr['ve_entryrecord.prostatuscode !='] = 2;
        if ($this->session->userinfo['usertypecode'] !== '0') {
            $result_arr['ve_entryrecord.franid'] = $this->session->userinfo['franchid'];
        }
        return $result_arr;
    }

    private function get_allprojectlist_predicate_arr()
    {
        $franid = $this->session->userinfo['franchid'];
        if ($this->session->userinfo['usertypecode'] !== '0') {
            $where = "(ve_entryrecord.franid='{$franid}' 
                        or  ve_entryrecord.franid in (SELECT ID from ve_franchiser WHERE parenntfranid='{$franid}')) 
                        and ve_entryrecord.entrytypecode=1";
        } else {
            $where = "ve_entryrecord.entrytypecode=1";
        }
        return $where;
    }

}