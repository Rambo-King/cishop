<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 下午5:55
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('captcha');
    }

    public function login(){
        $this->load->view('admin/login.html');
    }

    public function captcha(){
        $param = [
            //'img_path' => './source/captcha/',
            //'img_url' => base_url(). 'source/captcha/',
            //'expiration' => 10,
            'word_length' => 6,
            //'word' => rand(1000, 9999),
            //'word' => $this->_RandChar(6),
        ];
        $word = create_captcha($param);
        //return $word;
    }

    private function _RandChar($len){
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;
        $str = null;
        for($i=0; $i<$len; $i++){
            $str .= $strPol[mt_rand(0, $max)];
        }
        return $str;
    }
}
