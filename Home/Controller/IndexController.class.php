<?php

/**
 * Created by PhpStorm.
 * User: Phantasy
 * Date: 2017/5/9
 * Time: 下午8:27
 */
namespace Home\Controller;

use Frame\Libs\BaseController;

final class IndexController extends BaseController{
    public function index(){
        $this->smarty->display(VIEW_PATH.'Index'.DS.'index.html');
    }
}