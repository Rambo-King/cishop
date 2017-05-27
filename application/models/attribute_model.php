<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-26
 * Time: 下午2:31
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute_model extends CI_Model{

    CONST TBL = 'attribute';

    public function add($data){
        return $this->db->insert(self::TBL, $data);
    }

    public function getList(){
        $query = $this->db->get(self::TBL);
        return $query->result_array();
    }

    public function getByCondition($id){
        $condition = ['type_id' => $id];
        $query = $this->db->where($condition)->get(self::TBL);
        return $query->result_array();
    }

    /*
    public function getListPage($limit, $offset){
        $query = $this->db->limit($limit, $offset)->get(self::TBL);
        return $query->result_array();
    }

    public function getCount(){
        return $this->db->count_all(self::TBL);
    }
    */

}