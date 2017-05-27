<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-27
 * Time: 上午9:27
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Good extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('type_model', 'tModel');
        $this->load->model('attribute_model', 'aModel');
        $this->load->model('brand_model', 'bModel');
        $this->load->model('region_model', 'rModel');
    }

    public function index(){
        $data = [];
        $this->load->view('admin/goods_list.html', $data);
    }

    public function add(){
        $data['types'] = $this->tModel->getList();
        $data['brands'] = $this->bModel->getList();
        $data['regions'] = $this->rModel->_list();
        $this->load->view('admin/goods_add.html', $data);
    }

    public function edit(){
        $this->load->view('admin/goods_edit.html');
    }

    public function ajax_attribute(){
        $id = $this->input->get('id');
        $attributes = $this->aModel->getByCondition($id);
        $html = '';
        foreach($attributes as $val){
            $html .= '<tr>';
            $html .= '<td class="label">'.$val['attr_name'].'</td>';
            $html .= '<td>';
            $html .= '<input type="hidden" name="attr_id_list[]" value="'.$val['attr_id'].'">';
            switch($val['attr_input_type']){
                case 0://文本框
                    $html .= '<input name="attr_value_list[]" type="text">';
                    break;
                case 1://下拉框
                    $values = explode(PHP_EOL, $val['attr_value']);
                    $html .= '<select name="attr_value_list[]">';
                    foreach($values as $v){
                        $html .= '<option value="'.$v.'">'.$v.'</option>';
                    }
                    $html .= '</select>';
                    break;
                case 2://文本域
                    break;
            }

            $html .= '</td>';
            $html .= '</tr>';
        }
        echo $html;
    }

}