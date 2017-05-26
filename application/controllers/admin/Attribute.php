<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-26
 * Time: 下午5:29
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('type_model', 'model');
        $this->load->model('attribute_model', 'attrModel');
    }

    public function index(){
        $data['attributes'] = $this->attrModel->getList();
        $this->load->view('admin/attribute_list.html', $data);
    }

    public function add(){
        if($_POST){
            $params = [
                'attr_name' => $this->input->post('attr_name'),
                'type_id' => $this->input->post('type_id'),
                'attr_type' => $this->input->post('attr_type'),
                'attr_input_type' => $this->input->post('attr_input_type'),
                'attr_value' => $this->input->post('attr_value'),
            ];
            if($this->attrModel->add($params)){
                $data = [
                    'url' => site_url('admin/attribute/index'),
                    'message' => 'Attribute Add Success',
                    'wait' => 1,
                ];
                $this->load->view('admin/message.html', $data);
            }else{
                $data = [
                    'url' => site_url('admin/attribute/add'),
                    'message' => 'Attribute Add Failure',
                    'wait' => 1,
                ];
                $this->load->view('admin/message.html', $data);
            }
        }else{
            $data['types'] = $this->model->getList();
            $this->load->view('admin/attribute_add.html', $data);
        }
    }

    public function edit(){
        $this->load->view('admin/attribute_edit.html');
    }

}