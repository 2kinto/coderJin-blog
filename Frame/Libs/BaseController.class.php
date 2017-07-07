<?php

/**
 * Created by PhpStorm.
 * User: Phantasy
 * Date: 2017/5/9
 * Time: 下午8:28
 */
namespace Frame\Libs;





use Frame\Vendor\Smarty;

abstract class BaseController {
    protected $smarty = null;

    public function __construct() {
        $this->initSmarty();
    }

    protected function initSmarty() {
        $smarty = new Smarty();

        $smarty->left_delimiter = '<{';
        $smarty->right_delimiter = '}>';
        $smarty->setTemplateDir(VIEW_PATH);
        $smarty->setCompileDir(sys_get_temp_dir().DS.'view_c');
        $this->smarty = $smarty;
    }

}