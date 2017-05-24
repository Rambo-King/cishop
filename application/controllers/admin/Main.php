<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 下午5:28
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Admin_Controller{

    public function index(){
        $this->load->view('admin/index.html');
    }

    public function top(){
        $this->load->view('admin/top.html');
    }

    public function menu(){
        $this->load->view('admin/menu.html');
    }

    public function drag(){
        $this->load->view('admin/drag.html');
    }

    public function content(){
        $this->load->view('admin/main.html');
    }

}