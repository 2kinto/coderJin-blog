<?php
define('DS',DIRECTORY_SEPARATOR);
define('ROOT_PATH',getcwd().DS);   //网站根目录

require_once(ROOT_PATH.'Frame'.DS.'Frame.class.php');

\Frame\Frame::run();

?>