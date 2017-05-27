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
        $data['regions'] = $this->rModel->front_cate();

        //载入多个视图  分离
        $this->load->view('header.html', $data);

        $this->load->view('menu1.html');

        $this->load->view('index.html');

        $this->load->view('footer.html');
    }

}