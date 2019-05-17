<?php

/**
 * Created by PhpStorm.
 * User: CH
 * Date: 2018/10/23
 * Time: 17:55
 * 权限模型
 */
class Sys_competence extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *根据权限分配获取当前用户所适用左部菜单。
     */
    public function getcurrentusermenu(){
        return "adminmenu";
    }
}