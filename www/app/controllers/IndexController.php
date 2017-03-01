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
			$this->generateviewAction('index');
		}
	}
 ?>
