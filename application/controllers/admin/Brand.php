<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-26
 * Time: 上午10:31
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Admin_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('brand_model', 'model');
        $this->load->library('upload');
    }

    public function index(){
        $data['brands'] = $this->model->getList();
        $this->load->view('admin/brand_list.html', $data);
    }

    public function add(){
        $this->load->view('admin/brand_add.html');
    }

    public function edit(){
        $this->load->view('admin/brand_edit.html');
    }

    public function insert(){

        $this->form_validation->set_rules('brand_name', '品牌名', 'required');

        if($this->form_validation->run() == false){
            $data = [
                'url' => site_url('admin/brand/add'),
                'message' => validation_errors(),
                'wait' => 1,
            ];
            $this->load->view('admin/message.html', $data);
        }else{
            /*$uploadConfig = [
                'upload_path' => './source/uploads/',
                'allowed_types' => 'gif|png|jpg',
                'max_size' => 100, //100kb
                'file_name' => '',
            ];
            $this->load->library('upload', $uploadConfig);*/
            //brand_logo:表单文件域名称 / 默认userfile
            if($this->upload->do_upload('brand_logo')){
                //上传成功
                $fileInfo = $this->upload->data();
                $name = $this->input->post('brand_name', true);
                if($this->model->add(['brand_name' => $name, 'logo' => $fileInfo['file_name']])){
                    $data = [
                        'url' => site_url('admin/brand/index'),
                        'message' => 'Add Success',
                        'wait' => 2,
                    ];
                    $this->load->view('admin/message.html', $data);
                }else{
                    echo 'Add Failure';
                }
            }else{
                //上传失败
                $data = [
                    'url' => site_url('admin/brand/index'),
                    'message' => $this->upload->display_errors('<p>', '</p>'),
                    'wait' => 2,
                ];
                $this->load->view('admin/message.html', $data);
            }
        }

    }

}