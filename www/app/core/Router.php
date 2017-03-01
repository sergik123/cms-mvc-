<?php
/**
 * Class Router create new controller and action 
 *
 * @author sergey
 */
class Router {
    public static function  start(){
        $uri=trim($_SERVER['REQUEST_URI'],'/');
        if(!empty($uri)){
            $str= explode('/', $uri);
            $controller= array_shift($str);
            $filecontroller= ucfirst($controller).'Controller'; 
            if(!empty($str)){
                $action= array_shift($str);
                $fileaction= lcfirst($action).'Action'; 
            }
            if(!empty($str)){
                $params=$str;
            }else{
                $params='';
            }
          
           if(!file_exists("controllers/$filecontroller".'.php')){

               $contr=new $filecontroller;
             
               if(method_exists($contr,$fileaction)){
                   $contr->$fileaction($params);
               }
           }
        }else{
          $contr= new IndexController;
          $contr->mainAction();
        }
        
    }
}
