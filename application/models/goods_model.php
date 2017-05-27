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

    //获取推荐商品信息
    public function best(){
        $query = $this->db->where(['is_best' => 1])->get(self::TBL);
        return $query->result_array();
    }

    public function findById($id){
        $query = $this->db->where(['goods_id' => $id])->get(self::TBL);
        return $query->row_array();
    }

}