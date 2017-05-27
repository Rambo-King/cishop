<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-27
 * Time: 下午2:08
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('region_model', 'rModel');
        $this->load->model('goods_model', 'gModel');
    }

    public function index(){
        //$data['goods'] = $this->gModel->best();
        //$this->load->view('index.html', $data);
        $data['regions'] = $this->rModel->front_cate();
        $this->load->view('index.html', $data);
    }

}