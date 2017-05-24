<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 下午3:39
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends  CI_Loader{

    protected $_theme = 'default/';

    //开启皮肤
    public function switch_themes_on(){
        $this->_ci_view_paths = [THEMES_DIR.$this->_theme => true];
    }

    public function switch_themes_off(){
        //Just do Nothing
    }

}