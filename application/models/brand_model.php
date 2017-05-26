<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-26
 * Time: 上午11:39
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model{

    CONST TBL = 'brand';

    public function add($data){
        return $this->db->insert(self::TBL, $data);
    }

    public function getList(){
        $query = $this->db->get(self::TBL);
        return $query->result_array();
    }

}