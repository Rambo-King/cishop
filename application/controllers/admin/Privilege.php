<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 下午5:55
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege extends CI_Controller{

    public function login(){
        $this->load->view('admin/login.html');
    }

}
