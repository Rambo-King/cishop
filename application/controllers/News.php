<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 上午10:52
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('news_model', 'model');
    }

    public function add(){
        //$this->load->view('news/add.html');
        $this->load->view('news/add');
    }

    public function insert(){
        $data = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'content' => $_POST['content'],
            'created_at' => time()
        ];
        if($this->model->_insert($data)){
            echo 'success';
        }else{
            echo 'failure';
        }
    }

    public function nlist(){
        $data['news'] = $this->model->_list();
        $this->load->view('news/list.html', $data);
    }

}