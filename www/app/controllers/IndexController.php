<?php 
/**
 * Main controller. Generate view page.
 *
 * @author sergey
 */
	class IndexController extends ViewController{
		private $view;
		private $addmodel;
		public function mainAction(){
			//$this->view=new ViewController;
			$this->generateviewAction('index');

			if(!empty($_POST['sub'])){
				$this->addmodel=new AddUser;
				$this->addmodel->add($_POST);
			}
		}
	}
 ?>