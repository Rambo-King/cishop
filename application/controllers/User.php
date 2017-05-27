<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-27
 * Time: 下午4:16
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Home_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model', 'model');
    }

    public function register(){
        if($_POST){
            $this->form_validation->set_rules('username', '用户名', 'required');
            $this->form_validation->set_rules('pwd', '密码', 'required|min_length[6]|max_length[16]');
            $this->form_validation->set_rules('repwd', '确认密码', 'required|matches[pwd]');
            $this->form_validation->set_rules('email', '邮件', 'required|valid_email');
            if($this->form_validation->run() == false){
                print_r(validation_errors());
            }else{
                $params = [
                    'user_name' => $this->input->post('username', true),
                    'password' => md5($this->input->post('pwd', true)),
                    'email' => $this->input->post('email', true),
                    'reg_time' => time()
                ];
                if($this->model->add($params)){
                    echo 'success';
                }else{
                    echo 'failure';
                }
            }
        }else{
            $this->load->view('register.html');
        }
    }

    public function login(){
        if($_POST){
            $this->form_validation->set_rules('username', '用户名', 'required');
            $this->form_validation->set_rules('pwd', '密码', 'required');
            if($this->form_validation->run() == false){
                print_r(validation_errors());
            }else{
                $name = $this->input->post('username', true);
                $pass = $this->input->post('pwd', true);
                if($user = $this->model->getUser($name, $pass)){
                    //保持到session
                    $this->session->set_userdata('user', $user);
                    redirect('home');
                    //echo 'success';
                }else{
                    echo 'failure';
                }
            }
        }else{
            $this->load->view('login.html');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('home');
    }

}