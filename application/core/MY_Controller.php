<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 下午3:45
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//前台总控
class Home_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->switch_themes_on();
    }

}

//后台总控
class Admin_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->switch_themes_off();
    }

}