<?php 
/**
 * Данный контроллер позволяет выбирать шаблон для сайта
 *
 * @author sergey
 */
	class TemplatesController extends ViewController{
		/*метод передает данные для сохранения имени текущего шаблона и подключает файл для отображения*/
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