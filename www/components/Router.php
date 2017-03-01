<?php 
/*Класс который подкючает определенный контроллер и action в зависимости от введенного url. Нужен для создания ЧПУ*/
	class Router{

		private $routes;
		private $errors=true;
		public function __construct()
		{
			$routesPath=ROOT.'/config/routes.php';
			$this->routes=include($routesPath);// файл в котором прописаны пути и какой контроллер должен обрабатывать путь
		}
		/*Returns uri
		 * @return string
		 */
		public function getUri()
		{
			if(!empty($_SERVER['REQUEST_URI']))
			{
				return trim($_SERVER['REQUEST_URI'],'/');
			}
		}
		/*метод для работы с контролерами и методами. Здесь формируются и подключаются необходимые классы.*/
		public function run()
		{
			$url=$this->getUri();
			$all_routes=$this->routes;
			
			foreach ($all_routes as $key=>$value){
					
				if(preg_match("~$key~", $url))
				{
						$this->errors=false;
						//$this->category($key,$value,$url);
						 $inside=preg_replace("~$key~", $value, $url);
						 $array=explode('/', $inside);
						
						$controller=array_shift($array);
						
						 $action=array_shift($array);
						  $controller=ucfirst($controller).'Controller';
						 $action='action'.ucfirst($action);
						 $parametrs=$array;

						  $filecontroller=ROOT.'/controller/'.$controller.'.php';
							if(file_exists($filecontroller))
								include_once($filecontroller);
						$cur_controller=new $controller;
						$result=call_user_func_array(array($controller,$action), $parametrs);
						$cur_controller->$action($result);
		
			break;
					
				}
			}
		}
		
	}
 ?>