<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-25
 * Time: 下午3:52
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model{

    CONST TBL = 'region';

    public function _list($pid = 0){
        $query = $this->db->get(self::TBL);
        $dataSet = $query->result_array();
        return $this->_tree($dataSet, $pid);
    }

    private function _tree($dataSet, $pid = 0, $level = 0){
        static $tree = [];
        foreach($dataSet as $row){
            if($row['parent_id'] == $pid){
                $row['level'] = $level; //展示缩进时使用
                $tree[] = $row;
                $this->_tree($dataSet, $row['cat_id'], $level + 1);
            }
        }
        return $tree;
    }

    public function _add($data){
        return $this->db->insert(self::TBL, $data);
    }

    public function _one($id){
        $query = $this->db->where(['cat_id' => $id])->get(self::TBL);
        return $query->row_array();
    }

    public function _modify($id, $data){
        return $this->db->where(['cat_id' => $id])->update(self::TBL, $data);
    }

}