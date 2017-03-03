<?php 
/**
 * Данный контроллер отвечает за работу с меню
 *
 * @author sergey
 */
class MenuController extends ViewController{
	protected $model;
	/*метод вызывает ViewController и подключает файл menu.php*/
	public function addAction(){

		 $this->generateviewAction('menu');
	}
	/*метод передает данные для сохранения в модель и подключает файл для отображения меню*/
	public function saveAction($post=" "){
		  $this->model=new Menu;
      
         $this->generateviewAction('menu');
         echo  $this->model->save_menu($_POST);  
	}
	/*метод получает названия всех меню из модели и подключает файл allmenu.php для отображения меню*/
	public function allAction($post=" "){
		  $this->model=new Menu;
      	 $result=$this->model->get_name_menu();

         $this->generateviewAction('allmenu', $result,'all'); 
	}
	/*метод получает данные из модели для нужного меню и подключает файл для его отображения*/
	public function updateAction($post=" "){
		 $this->model=new Menu;
      	 $result=$this->model->get_current_menu($post[0]);

         $this->generateviewAction('allmenu', $result,'update'); 
	}
	/*метод передает данные в модель для удаления меню и подключает файл для его отображения*/
	public function deleteAction($post=" "){
		 $this->model=new Menu;
      	 $result=$this->model->delete_menu($post[0]);

         $this->generateviewAction('allmenu', $result,'deletemenu');
	}
	/*метод отвечает за редактирование меню. Передает необходимые данные модели и подключает файл для его отображения*/
	public function editAction($post=" "){
		 $this->model=new Menu;
		 $mainlink=array();
		 $backlink=array();
		 $urllink=array();
		 $backurllink=array();
		 $id=array();
		 foreach ($_POST as $key => $value) {
		 	if(preg_match('~updatelink~', $key)){
			 	$id=explode('-', $key);
			 }
		 }
		 foreach ($_POST as $key => $value) {
		 	if(preg_match('~deletelink~', $key)){
			 	$id=explode('-', $key);
			 	$result=$this->model->delete_link_menu($id[1]);
		 	  $this->generateviewAction('allmenu', $result,'delete');
			 }
		 }
		 foreach ($_POST as $key => $value) {
			 if(preg_match('~main_link~', $key)){
			 	$idmainlink=explode('-', $key);	 	
			 	if($idmainlink[1]==$id[1]){
			 		$mainlink=$value;			 		
			 	}
			 }
			 if(preg_match('~back_link~', $key)){
			 	$idbacklink=explode('-', $key);
			 	if($idbacklink[1]==$id[1]){
			 		$backlink=$value;
			 	}
			 }
			 if(preg_match('~link_btn~', $key)){
			 	$idurllink=explode('-', $key);
			 	if($idurllink[1]==$id[1]){
			 		$urllink=$value;
			 	}
			 }
			 if(preg_match('~link_lst~', $key)){
			 	$idurlbacklink=explode('-', $key);
			 	if($idurlbacklink[1]==$id[1]){
			 		$backurllink=$value;
			 	}
			 }
		 }
		 	 $result=$this->model->update_link_menu($id[1],$mainlink,$backlink, $urllink, $backurllink);
		 	 $this->generateviewAction('allmenu', $result,'send');
	}
}	
 ?>
