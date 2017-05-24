<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 上午10:14
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller{

    public function index(){
        //http://localhost/cishop/index.php/hello/index CodeIgniter

        echo 'index function';
        //$this->load->view('hello.html');

        $data = ['title' => 'title1', 'content' => 'content2'];
        $this->load->view('hello/index', $data);
    }

}