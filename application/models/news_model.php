<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 上午11:19
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model{

    CONST TBL = 'news';

    public function __construct(){
        parent::__construct();
        $this->load->database(); //手动载入数据库操作类 Active Record => AR
    }

    public function _insert($data){
        return $this->db->insert(self::TBL, $data);
    }

    public function _list(){
        $query = $this->db->get(self::TBL);
        return $query->result_array();
    }

}