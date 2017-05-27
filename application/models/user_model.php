<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-27
 * Time: 下午4:32
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    CONST TBL = 'user';

    public function add($data){
        return $this->db->insert(self::TBL, $data);
    }

    public function getUser($name, $pass){
        $query = $this->db->where(['user_name' => $name, 'password' => md5($pass)])->get(self::TBL);
        return $query->row_array();
    }

}