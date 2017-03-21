<?php 
namespace core;
class Core
{
	public static $classMap = array();
	static public function run(){

		$route = new \core\lib\Route();
		$ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
    
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $ctrl = new $cltrlClass();
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
	}

	//自动加载类库
	static public function load($class){
		//new \core\route();
		//$class = '\core\route';
		//SEN.'/core/route.php';
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\','/',$class);
			$file = SEN.'/'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}

	}
}