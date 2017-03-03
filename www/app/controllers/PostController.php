<?php 
class PostController extends ViewController{
	private $view;
    private $model;
    private $id;
    private $path;
     /*метод подключает страницу для редактирования*/
	public function addAction($id=" "){

	   $this->generateviewAction('post');
	}
   /*метод получает от модели название текущего шаблона и подключает страницу для редактирования*/
	public function allAction($params=" "){
      $result=$this->all_posts();
      $savetemplate=new Templates;
      $post=$savetemplate->get_active_template();
      $this->generateviewAction('allpost',$post,$result);
    }
      /*метод отвечает за отображение, сохранение, публикацию и обновления статей.*/
	public function showAction($params=" "){
    	$this->path="show";
    	$this->id=$params[0];
        $savetemplate=new Templates;
        $post=$savetemplate->get_active_template();

    	if(!empty($_POST['show'])){
           $content=$_POST;
    	   $this->generatePostView($params,$post,$content,$this->path);
    	}
    	if(!empty($_POST['save'])){
           $this->model=new Savepost;
           $status=$this->model->save($_POST, $this->id,$post);
           $this->generateviewAction('post',$status,$post);
    	}
	   	if(!empty($_POST['public'])){
	   		$content=$_POST;
    		$this->generatePostView('Запись опубликована',$post,$content,'public');
    	}
    	if(!empty($_POST['update'])){        
         $this->model=new Posts;
         $this->model->update_post($_POST,$params[0]);
      }
    }
      /*метод получает от модели данные для отображения одной статьи и название текущего шаблона.*/
    public function singleAction($id=" "){
    	 $savetemplate=new Templates;
         $post=$savetemplate->get_active_template();
         $result=$this->all_posts($id[0]);
         
         $this->generatePostView($id,$post,$result,' ');
    }
    /*метод получает от модели данные и отображает обновленную статью */
    public function updateAction($id=" "){

        $this->model=new Posts;
        $post= $this->model->all_posts($id[0]);
        $this->generateviewAction('post',$post,'update');
    }
     /*метод получает от модели данные и удаляет выбранную статью */
    public function deleteAction($id=" "){
       $this->model=new Posts;
       $post= $this->model->all_posts($id[0]);   
       $this->model->delete_post($post);
       $this->allAction();
    }    
}
 ?>