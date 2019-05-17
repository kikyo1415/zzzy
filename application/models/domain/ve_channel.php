<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/11/4
 * Time: 12:06
 */
class ve_channel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getchannels()
    {
        $sql = "SELECT ID,channelcode,channelname FROM ve_channel WHERE  isenable=1";
        $query = $this->db->query($sql);
        $result['state'] = 1;
        foreach ($query->result_array() as $row) {
            $result['data'][] = $row;
        }
        $result['errmsg'] = '';
        return $result;
    }
}