<?php 
/**
 *入口文件
 *1.定义常量
 *2.加载函数库
 *3.启动框架 
 */

define("SEN",realpath('C:/code/statichtml/bjmovie01/haosen'));//框架所在目录
define("CORE",SEN.'/core');//框架核心文件所在目录
define("APP",SEN.'/app');//项目所处目录(控制器模型视图)

define("DEBUG",true);//是否开启调试模式
if(DEBUG){
	ini_set('display_error','On');
}else{
	ini_set('display_error','Off');
}

include CORE."/common/function.php";//加载函数库

include CORE.'/core.php';//加载核心文件

spl_autoload_register('\core\Core::load');


\core\Core::run();