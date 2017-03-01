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
		public function post_title($post_id=' '){

    	   $params=$_POST;
		   $this->model=new Posts;
		   return $this->model->title($post_id, $posts, $params);
    	}
	    public function post_content($post_id=' '){
	    	   $params=$_POST;
			   $this->model=new Posts;
			   return $this->model->content($post_id, $this->path, $params);
	    }
	     public function the_posts($id=" ",$limit=" "){
	    	 $this->model=new Posts;
	    	 $result=$this->model->all_posts($id,$limit);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value['post_link']);
	    	 }

			 return  $link;
	    }

	    public function page_title($page_id=' '){
	        $params=$_POST;
	    	$this->model=new Pages;
	    	return $this->model->title($page_id, $this->path, $params);
	    }
	    public function page_content($page_id=' '){
	    	$params=$_POST;
	        $this->model=new Pages;
	    	return $this->model->content($page_id, $this->path, $params);
	    }
	    public function the_pages($id=" "){
	    	 $this->model=new Pages;
	    	 $result=$this->model->all_pages($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value['page_include']);
	    	 }

			 return  $link;
	    }
	    public function all_pages($id=" "){
	    	 $this->model=new Pages;
	    	 $result=$this->model->all_pages($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value);
	    	 }
			 return  $link;
	    }

	    public function all_posts($id=" "){
	    	 $this->model=new Posts;
	    	 $result=$this->model->all_posts($id);
	    	 $link=array();
	    	 foreach ($result as  $value){
	    	 	array_push($link, $value);
	    	 }
			 return  $link;
	    }

	}
 ?>