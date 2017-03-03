<?php 
/**
 *  Generate all info from database.
 *
 * @author sergey
 */
	abstract class ContentController{
		private $view;
	    private $model;
	    private $id;
	    private $path;
	    /*метод отвечающий за вывод заголовка статьи*/
		public function post_title($post_id=' '){

    	   $params=$_POST;
		   $this->model=new Posts;
		   return $this->model->title($post_id, $posts, $params);
    	}
    	 /*метод отвечающий за вывод статьи*/
	    public function post_content($post_id=' '){
	    	   $params=$_POST;
			   $this->model=new Posts;
			   return $this->model->content($post_id, $this->path, $params);
	    }
	     /*метод отвечающий за вывод всех ссылок статей*/
	     public function the_posts($id=" ",$limit=" "){
	    	 $this->model=new Posts;
	    	 $result=$this->model->all_posts($id,$limit);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value['post_link']);
	    	 }

			 return  $link;
	    }
	     /*метод отвечающий за вывод заголовка страницы*/
	    public function page_title($page_id=' '){
	        $params=$_POST;
	    	$this->model=new Pages;
	    	return $this->model->title($page_id, $this->path, $params);
	    }
	     /*метод отвечающий за вывод содержания страницы*/
	    public function page_content($page_id=' '){
	    	$params=$_POST;
	        $this->model=new Pages;
	    	return $this->model->content($page_id, $this->path, $params);
	    }
	     /*метод отвечающий за вывод всех ссылок страниц*/
	    public function the_pages($id=" "){
	    	 $this->model=new Pages;
	    	 $result=$this->model->all_pages($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value['page_include']);
	    	 }

			 return  $link;
	    }
	     /*метод отвечающий за вывод всех страниц*/
	    public function all_pages($id=" "){
	    	 $this->model=new Pages;
	    	 $result=$this->model->all_pages($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value);
	    	 }
			 return  $link;
	    }
	     /*метод отвечающий за вывод всех статей*/
	    public function all_posts($id=" "){
	    	 $this->model=new Posts;
	    	 $result=$this->model->all_posts($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value);
	    	 }
			 return  $link;
	    }
	     /*метод отвечающий за вывод меню*/
	     public function current_menu($id=" "){

	    	 $this->model=new Menu;
	    	 $result=$this->model->get_current_menu($id);

	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value);
	    	 }
	    	  $this->generateviewAction('templatemenu', $link);
			 return  $link;

	    }

	}
 ?>