<?php

/**
 * Created by PhpStorm.
 * User: CHIBM
 * Date: 2018/12/24
 * Time: 11:50
 */
class ros_site extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('ve_comfunc');
        $this->load->helper('date');
    }

    public function add_site($data)
    {
        try {
            if ($this->db->insert('ros_site', $data)) {
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

    public function add_rentcontract($data)
    {
        try {
            if ($this->db->insert('ros_site_rentcontract', $data)) {
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

    public function get_site_many($wherearr = array())
    {
//        return $this->get_table('ros_site', $wherearr, 'sitename ASC');

        try {
            //查询构造
            $this->db
                ->select('ros_site.ID,
                                ros_site.sitename,
                                ros_level.levelstr,
                                ros_propertyright.pr,
                                ros_sitetype.sitetype,
                                ros_site.stieaddress,
                                ros_site.squarearea,
                                ros_branchcom.branchcom,
                                ros_area.area,
                                ros_powertype.powertype,
                                ros_cover.cover,
                                ros_site.remark,
                                ros_site.levelcode,
                                ros_site.prcode,
                                ros_site.sitetypecode,
                                ros_site.covercode,
                                ros_site.branchcomcode,
                                ros_site.areacode,
                                ros_site.powertypecode')
                ->from('ros_site')
                ->join('ros_area', 'ros_site.areacode=ros_area.areacode')
                ->join('ros_branchcom', 'ros_site.branchcomcode = ros_branchcom.branchcomcode')
                ->join('ros_cover', 'ros_site.covercode = ros_cover.covercode')
                ->join('ros_level', ' ros_site.levelcode = ros_level.levelcode ')
                ->join('ros_powertype', 'ros_site.powertypecode = ros_powertype.powertypecode')
                ->join('ros_propertyright', 'ros_site.prcode = ros_propertyright.prcode')
                ->join('ros_sitetype', 'ros_site.sitetypecode = ros_sitetype.sitetypecode')
                ->where($wherearr);
            $sql = $this->db->get_compiled_select('', false);
            $query = $this->db->get();

            if ($query) {
                //生成输出返回结果数组
                $result['state'] = 1;
                foreach ($query->result_array() as $row) {
                    $result['data'][] = $row;
                }
                $result['errmsg'] = '';
            } else {
                $result['state'] = 0;
                $result['errmsg'] = '查询失败';
            }

            return $result;
        } catch (Exception $e) {
            $result['state'] = 0;
            $result['data'] = array('affected_rows' => 0);
            $result['errmsg'] = 'exception';
            return $result;
        }
    }

    public function get_site_detail($siteid)
    {
        $siteinfo = $this->get_site_many(array('ros_site.ID' => $siteid));
        if ($siteinfo['state'] === 1)
            $sitedetail['siteinfo'] = $siteinfo['data'][0];
        return $sitedetail;
    }


    public function get_all_sitetype()
    {
        return $this->get_table('ros_sitetype');
    }

    public function get_all_sitelevel()
    {
        return $this->get_table('ros_level', array(), 'levelcode ASC');
    }

    public function get_all_powertype()
    {
        return $this->get_table('ros_powertype');
    }

    public function get_all_sitepr()
    {
        return $this->get_table('ros_propertyright');
    }

    public function get_all_covertype()
    {
        return $this->get_table('ros_cover', array(), 'covercode ASC');
    }

    public function get_all_branchcom()
    {
        return $this->get_table('ros_branchcom');
    }

    public function get_all_area()
    {
        return $this->get_table('ros_area');
    }

    //private methods

    /**
     * @param $tablename
     * @param array $where
     * @param string $orderby
     * @return array
     * @throws Exception
     */
    private function get_table($tablename, $where = array(), $orderby = 'ID ASC')
    {

        try {
            $query = $this->db->select('*')
                ->where($where)
                ->from($tablename)
                ->order_by($orderby)
                ->get();
            if ($query) {
                foreach ($query->result_array() as $row) {
                    $result[] = $row;
                }
                return $result;
            } else {
                return array();
            }
        } catch (Exception $exception) {
            throw  $exception;
        }

    }

    /**
     * @param $tablename
     * @param $where_arr
     * @return array
     * @throws Exception
     */
    private function get_table_first($tablename, $where_arr)
    {
        try {
            $query = $this->db
                ->select('*')
                ->from($tablename)
                ->where($where_arr)
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
}