<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-26
 * Time: 下午2:18
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('type_model', 'model');
        $this->load->library('pagination');
    }

    public function index(){
        $pageSize = 3;
        $offset = $this->uri->segment(4) ? ($this->uri->segment(4) - 1) * $pageSize : 0;
        $config = [
            'base_url' => site_url('admin/type/index'),
            'total_rows' => $this->model->getCount(),
            'per_page' => $pageSize,
            'uri_segment' => 4,
            'use_page_numbers' => true, //默认展示偏移量  true:显示页码
            'next_link' => '下一页',
            'prev_link' => '上一页',
            'first_link' => '首页',
            'last_link' => '最后页',
        ];
        $data['pages'] = $this->pagination->initialize($config)->create_links();
        //$data['types'] = $this->model->getList();
        $data['types'] = $this->model->getListPage($pageSize, $offset);
        $this->load->view('admin/goods_type_list.html', $data);
    }

    public function add(){
        if($_POST){
            $this->form_validation->set_rules('type_name', '类型名', 'required');
            if($this->form_validation->run() == false){
                $data = [
                    'url' => site_url('admin/type/add'),
                    'message' => validation_errors(),
                    'wait' => 2,
                ];
                $this->load->view('admin/message.html', $data);
            }else{
                $name = $this->input->post('type_name', true);
                if($this->model->add(['type_name' => $name])){
                    $data = [
                        'url' => site_url('admin/type/index'),
                        'message' => 'Add Success',
                        'wait' => 2,
                    ];
                    $this->load->view('admin/message.html', $data);
                }else{
                    echo 'Add Failure';
                }
            }
        }else{
            $this->load->view('admin/goods_type_add.html');
        }

    }

    public function edit(){

        $this->load->view('admin/goods_type_edit.html');
    }

} 