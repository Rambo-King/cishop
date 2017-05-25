<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-25
 * Time: 下午3:34
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('region_model', 'model');
        $this->load->library('form_validation');

        //激活分析器以调试
        $this->output->enable_profiler(true);
    }

    public function index(){
        $data['regions'] = $this->model->_list();
        $this->load->view('admin/cat_list.html', $data);
    }

    public function add(){
        $data['regions'] = $this->model->_list();
        $this->load->view('admin/cat_add.html', $data);
    }

    public function update(){
        $this->load->view('admin/cat_edit.html');
    }

    public function insert(){
        $this->form_validation->set_rules('cat_name', '分类名称', 'trim|required');
        if($this->form_validation->run() == false){
            $data = [
                'url' => site_url('admin/region/add'),
                'message' => validation_errors(),
                'wait' => 3,
            ];
            $this->load->view('admin/message.html', $data);
        }else{
            $name = $this->input->post('cat_name', true);
            $pid = $this->input->post('parent_id');
            if($this->model->_add(['cat_name' => $name, 'parent_id' => $pid])){
                $data = [
                    'url' => site_url('admin/region/index'),
                    'message' => 'Add Success',
                    'wait' => 3,
                ];
                $this->load->view('admin/message.html', $data);
            }else{
                echo 'Add Failure';
            }
        }
    }

}