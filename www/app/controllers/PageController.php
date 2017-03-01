<?php
/**
 * This class receive information from user, include model 
 * and generate need view page
 *
 * @author sergey
 */
class PageController extends ViewController{
    private $view;
    private $model;
    private $id;
    private $path;
    public function addAction($params=" "){
        $savetemplate=new Templates;
        $post=$savetemplate->get_active_template();

	      $this->generateviewAction('page','add',$post);
    }
    public function allAction($params=" "){
      $result=$this->all_pages();
      $savetemplate=new Templates;
      $post=$savetemplate->get_active_template();

      $this->generateviewAction('allpage',$post,$result);
    }
    public function showAction($params=" "){
    	$this->path="show";
    	$this->id=$params[0];
      $access=' ';
      $savetemplate=new Templates;
      $post=$savetemplate->get_active_template();

    	if(!empty($_POST['show'])){
    		 $this->generateviewAction('selected',$this->path,$post);
    	}
    	if(!empty($_POST['save'])){
         $this->model=new Savepage;
         $status=$this->model->save($_POST, $this->id);

    	   $this->generateviewAction('page',$status,$post);
    	}
	   	if(!empty($_POST['public'])){
    		  $this->model=new Pages;
          $access=$this->model->link_page($_POST['page_include']);  

          $this->generatePageView($this->id,$post,'public',$access);
    	}
      if(!empty($_POST['update'])){        
         $this->model=new Pages;
         $this->model->update_page($_POST,$_POST['page_include']);
         $post= $this->model->link_page($_POST['page_include']);

         $this->generateviewAction('page','update',$post);
     
      }
    }
    public function singleAction($page_id=' '){
        $savetemplate=new Templates;
        $post=$savetemplate->get_active_template();       
        $this->model=new Pages;
        $access=$this->model->link_page($page_id[0]);

        $this->generatePageView($page_id[0],$post,$main,$access);
    }
    public function updateAction($id=" "){
        $this->model=new Pages;
        $post= $this->model->link_page($id[0]);

        $this->generateviewAction('page','update',$post);
    }
    public function deleteAction($id=" "){
       $this->model=new Pages;
       $post= $this->model->link_page($id[0]);   
       $this->model->delete_page($post);

       $this->allAction();
    }
}
