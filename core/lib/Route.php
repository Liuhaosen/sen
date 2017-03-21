<?php
namespace core\lib;
class Route{
	public $ctrl;
	public $action;
	public function __construct(){
		//xxx.com/index.php/index/index
		/**
		 *1. 隐藏index.php
		 *2. 获取url 参数部分
		 *3. 返回对应的控制器和方法
		 **/
		// P(substr($_SERVER['REQUEST_URI'],7));die;
		if(isset($_SERVER['REQUEST_URI']) && substr($_SERVER['REQUEST_URI'],4) != '/'){
			//index/index
			$path = substr($_SERVER['REQUEST_URI'],4);
			$path_arr = explode('/',trim($path,'/'));
			// p($path_arr);die;
			if(isset($path_arr[0])){
				$this->ctrl = $path_arr[0];
			}
			unset($path_arr[0]);
			if(isset($path_arr[1])){
				$this->action = $path_arr[1];
				unset($path_arr[1]);
			}else{
				$this->action = 'index';
			}

			//url多余部分转换成 get
			//id/1/str/2/test/3
			$count = count($path_arr) + 2;
			$i = 2;
			while($i<$count){
				if(isset($path_arr[$i+1])){
					$_GET[$path_arr[$i]] = $path_arr[$i+1];
				}
					$i = $i + 2;
			}
			
		}else{
			$this->ctrl = 'index';
			$this->action = 'index';
		}
	}
}