<?php 
class MenuController extends ViewController{
	protected $model;
	public function addAction(){
		 $this->generateviewAction('menu');
	}
	public function saveAction($post=" "){
		  $this->model=new Menu;
          $this->model->save_menu($_POST);
	}
}	
 ?>