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
    /*
    array(
        array(
            'id' => 1,
            'name' => '服装',
            'pid' => 0,
            'child' => array(
                array(
                    'id' => 2
                    'name' => '男装',
                    'pid' => 1,
                    'child' => array(
                        array(
                            'id' => 3
                            'name' => '夹克',
                            'pid' => 2,
                        ),
                        array(
                            'id' => 4
                            'name' => '牛仔',
                            'pid' => 2,
                        )
                    )
                ),
                array(
                    'id' => 5
                    'name' => '女装',
                    'pid' => 1,
                    'child' => array(...)
                )
            )
        ),
        array(
            'id' => 10,
            'name' => '鞋帽',
            'pid' => 0,
            'child' => array(...)
        )
    )
    */
    public function front_cate(){
        $query = $this->db->get(self::TBL);
        return $this->_front_tree($query->result_array());
    }

    public function _front_tree($data, $pid = 0){
        $child = $this->_child($data, $pid);
        if(empty($child)) return null;

        foreach($child as $k=>$val){
            $current_child = $this->_front_tree($data, $val['cat_id']);
            if(!is_null($current_child)){
                $child[$k]['child'] = $current_child;
            }
        }

        return $child;
    }

    public function _child($data, $pid = 0){
        $child = [];
        foreach($data as $d){
            if($d['parent_id'] == $pid)
                $child[] = $d;
        }
        return $child;
    }

}