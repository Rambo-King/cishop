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
        $this->load->model('goods_model', 'gModel');
    }

    public function index(){
        $data = [];
        $this->load->view('admin/goods_list.html', $data);
    }

    public function add(){
        if($_POST){
            $params = [
                'goods_name' => $this->input->post('goods_name', true),
                'cat_id' => $this->input->post('cat_id', true),
                'brand_id' => $this->input->post('brand_id', true),
                'shop_price' => $this->input->post('shop_price', true),
            ];
            $config = [
                'upload_path' => './source/uploads/',
                'allowed_types' => 'gif|jpg|png',
            ];
            $this->load->library('upload', $config);
            if($this->upload->do_upload('goods_img')){
                //图片上传成功  生成缩略图
                $file = $this->upload->data();
                $image = [
                    'image_library' => 'gd2',
                    'create_thumb' => true,
                    'maintain_ratio' => true,
                    'source_image' => './source/uploads/'.$file['file_name'],
                    'width' => 160,
                    'height' => 160,
                ];
                $this->load->library('image_lib', $image);
                if($this->image_lib->resize()){
                    $data = [
                        'goods_thumb' => $file['raw_name'].$this->image_lib->thumb_marker.$file['file_ext'],
                        'goods_img' => $file['file_name'],
                    ];
                    if($gid = $this->gModel->add($data)){
                        //商品添加成功  检查是否需要添加属性  多表操作
                        $attr_ids = $this->input->post('attr_id_list');
                        $attr_values = $this->input->post('attr_value_list');
                        foreach($attr_values as $k=>$v){
                            if(!empty($v)){
                                $this->db->insert('goods_attr', [
                                    'goods_id' => $gid,
                                    'attr_id' => $attr_ids[$k],
                                    'attr_value' => $v,
                                ]);//添加到商品属性表
                            }
                        }

                        //添加商品成功
                        $data = [
                            'url' => site_url('admin/good/index'),
                            'message' => 'Good Add Success',
                            'wait' => 2,
                        ];
                        $this->load->view('admin/message.html', $data);
                    }else{
                        //添加商品失败
                        $data = [
                            'url' => site_url('admin/good/add'),
                            'message' => 'Good Add Failure',
                            'wait' => 2,
                        ];
                        $this->load->view('admin/message.html', $data);
                    }
                }else{
                    $data = [
                        'url' => site_url('admin/good/add'),
                        'message' => $this->image_lib->display_errors(),
                        'wait' => 2,
                    ];
                    $this->load->view('admin/message.html', $data);
                }
            }else{
                $data = [
                    'url' => site_url('admin/good/add'),
                    'message' => $this->upload->display_errors(),
                    'wait' => 2,
                ];
                $this->load->view('admin/message.html', $data);
            }

            $this->gModel->add($params);
        }else{
            $data['types'] = $this->tModel->getList();
            $data['brands'] = $this->bModel->getList();
            $data['regions'] = $this->rModel->_list();
            $this->load->view('admin/goods_add.html', $data);
        }
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