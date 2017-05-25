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

    //uri 类 接收第一个参数 $id || $this->uri->segment(4, 0)
    public function update($id){
        $data['regions'] = $this->model->_list();
        $data['region'] = $this->model->_one($id);
        $this->load->view('admin/cat_edit.html', $data);
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

    //更新时 父分类值 不可是本身 及 子分类
    public function modify(){
        $id = $this->input->post('cat_id');
        $pid = $this->input->post('parent_id');
        //获取子分类
        $subCategory = $this->model->_list($id);
        $temp = [$id];
        foreach($subCategory as $v){
            $temp[] = $v['cat_id'];
        }
        if(!in_array($pid, $temp)){
            $data = [
                'cat_name' => $this->input->post('cat_name', true),
                'parent_id' => $this->input->post('parent_id'),
            ];
            if($this->model->_modify($id, $data)){
                $d = [
                    'url' => site_url('admin/region/index').'/'.$id,
                    'message' => '更新成功',
                    'wait' => 2,
                ];
                $this->load->view('admin/message.html', $d);
            }else{
                $d = [
                    'url' => site_url('admin/region/index').'/'.$id,
                    'message' => '更新失败',
                    'wait' => 2,
                ];
                $this->load->view('admin/message.html', $d);
            }
        }else{
            $data = [
                'url' => site_url('admin/region/update').'/'.$id,
                'message' => '不可将分类放置到当前分类或其子分类',
                'wait' => 3,
            ];
            $this->load->view('admin/message.html', $data);
        }
    }

}