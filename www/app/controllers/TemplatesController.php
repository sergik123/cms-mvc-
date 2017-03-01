<?php 
	class TemplatesController extends ViewController{
		public function selectAction(){
			$savetemplate=new Templates;
			if(!empty($_POST['active_template'])){
				$post=$_POST['active'];	
				
				$savetemplate->save($post);
			}else{

				 $post=$savetemplate->get_active_template();
				
			}
			 $this->generateviewAction('template',$post);
		}
	}
 ?>