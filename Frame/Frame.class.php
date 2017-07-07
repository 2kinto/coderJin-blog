<?php
/**
 * Created by PhpStorm.
 * User: Phantasy
 * Date: 2017/5/9
 * Time: 下午7:30
 */

namespace Frame;


final class Frame {
    public static function run() {
        self::initCharset();
        self::initPhpErr();
        self::initConfig();
        self::initConst();
        self::initRoutes();
        self::initAutoload();
        self::initDispatch();
    }

    private static function initCharset() {
        header('content-type:text/html;charset=utf-8');
    }

    private static function initPhpErr() {
        ini_set('display_errors','on');      //开启PHP报错
        ini_set('error_reporting',E_ALL|E_STRICT);      //设置错误等级
    }

    private static function initConfig() {
        $GLOBALS['config'] = require_once (ROOT_PATH.'Home'.DS.'Conf'.DS.'Config.php');
    }

    private static function initConst() {
        define('VIEW_PATH',ROOT_PATH.'Home'.DS.'View'.DS);
        define('FRAME_PATH',ROOT_PATH.'Frame'.DS.'Frame.class.php');
    }

    private static function initRoutes() {
        $p = $GLOBALS['config']['default_plat'];
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'] ;
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'] ;
        define('PLAT',$p);
        define('CONTROLLER',$c);
        define('ACTION',$a);
    }

    private static function initAutoload() {
        spl_autoload_register(function($className){
            $filePath = ROOT_PATH.str_replace('\\',DS,$className).'.class.php';
            if(file_exists($filePath)){
                require_once ($filePath);
            }
        });
    }

    private static function initDispatch() {
        $c = '\\'.PLAT.'\\'.'Controller'.'\\'.CONTROLLER.'Controller';
        $frameObj = new $c();
        $a = ACTION;
        $frameObj -> $a();
    }
}
