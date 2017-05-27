<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-27
 * Time: 上午11:35
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_model extends CI_Model{

    CONST TBL = 'goods';

    public function add($data){
        $query = $this->db->insert(self::TBL, $data);
        return $query ? $this->db->insert_id() : false;
    }

    public function getList(){
        $query = $this->db->get(self::TBL);
        return $query->result_array();
    }

}