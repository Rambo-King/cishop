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
        $this->load->library('form_validation');
    }

    public function destroy(){

    }

    public function logout(){
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect('admin/privilege/login');
    }

    public function login(){
        $this->load->view('admin/login.html');
    }

    public function signin(){
        //验证表单
        $this->form_validation->set_rules('username', '用户名', 'required');
        $this->form_validation->set_rules('username', '密码', 'required');

        if($this->form_validation->run() == false){
            $data = [
                'url' => site_url('admin/privilege/login'),
                'message' => validation_errors(),
                'wait' => 3,
            ];
            $this->load->view('admin/message.html', $data);
        }

        //获取表单数据
        $code = strtolower($this->input->post('captcha'));
        $session_code = strtolower($this->session->userdata('code'));
        if($code === $session_code){
            //验证用户名密码
            $name = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            if($name == 'admin' && $pass == '123456'){
                //存入session后跳转后台首页
                $this->session->set_userdata('admin', $name);
                redirect('/admin/main/index');
            }else{
                $data = [
                    'url' => site_url('admin/privilege/login'),
                    'message' => 'Username Or Password Wrong',
                    'wait' => 3,
                ];
                $this->load->view('admin/message.html', $data);
            }
        }else{
            //跳转提示页面
            $data = [
                'url' => site_url('admin/privilege/login'),
                'message' => 'Code Wrong',
                'wait' => 3,
            ];
            $this->load->view('admin/message.html', $data);
        }

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
        $code = create_captcha($param);
        $this->session->set_userdata('code', $code);
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
