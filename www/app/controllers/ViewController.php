<?php 
/**
 * Контроллер отвечает за подключение файл для отображения. 
 * Все подключения файлов происходят только в этом контроллере
 * Все остальные контроллеры наследуются от него
 * @author sergey
 */
	class ViewController extends ContentController{

		protected $data;
		protected $flag_visible=false;
		protected $flag_password=false;

	/*метод подключает внутренние файлы cms для отображения*/
		public function generateviewAction($view=" ", $id=" ",$template=" "){
			
			include_once ROOT."/app/views/$view".'.php';
		}

	/*метод подключает файлы для отображения страниц*/
		public function generatePageView($id=" ",$template=" ",$path=" ",$access=" "){	
			if(!empty($access)){
				$this->validation($access);
			}	
			$page_include=$access[0]['page_include'];
			if($path=="public"){
				$file=fopen('templates/'.$template.'/'.$page_include.'.php', "w");
	            $file_r=file_get_contents('templates/'.$template.'/'.$access[0]['main_file']);
	            fwrite($file, $file_r);
	            fclose($file);
	            $url=ROOT."/templates/$template/$page_include.php";
                include_once $url;
			}else{
			  if($access[0]['visible']==0 && $access[0]['pass_visible']==0 || $this->flag_visible==true && $this->flag_password==true){
           		$url=ROOT."/templates/$template/$page_include.php";
            	 if(file_exists($url)){
            	 	include_once $url;
            	 }
           	  }
			}
		}
	/*метод подключает файлы для отображения статей*/
		public function generatePostView($id=" ",$template=" ", $access=" ",$path=" "){
		
			$this->validation($access);
       
			$id=$id[0];
			if($path=="public"){
				$file=fopen('templates/'.$template.'/post.php', "w");
	            $file_r=file_get_contents('templates/'.$template.'/index.php');
	            fwrite($file, $file_r);
	            fclose($file);
	            $url=ROOT."/app/views/post.php";
            	include_once $url;
			}else{
			  if($access[0]['visible']==0 && $access[0]['pass_visible']==0 || $this->flag_visible==true && $this->flag_password==true){
					$url=ROOT."/templates/$template/post.php";
				 if(file_exists($url)){
				 	include_once $url;
				 }else{
				 	echo "Вы еще не создали ни одной статьи";
				 }
			  }	 
			}
		}
	/*метод отвечает за валидацию данных и подключает необходимые страницы*/
		public function validation($access=" "){
			$date=explode(' ', $access[0]['date_public']);
			$year=explode('-', $date[0]);
			$time=explode(':', $date[1]);
			$lastday = mktime($time[0], $time[1], $time[2], $year[1], $year[2], $year[0]);

			if($access==1){
            	include_once ROOT."/app/views/404.php";
            }
         
          if($access[0]['pass_visible']==1){
	           	 if(empty($_POST['pass_page'])){
	            	 if($access[0]['pass_visible']==1){
	            	include_once ROOT."/app/views/form.php";
	            	}
	            	
	        	}else{
	        		if($access[0]['page_password']==md5($_POST['pass_page'])){
            		$this->flag_password=true;
	            	}else{
	            		include_once ROOT."/app/views/404.php";
	            		echo "Вы ввели неправильный пароль".'<br>';
	            	}
	        	}
           		
           }else{
           	$this->flag_password=true;
           }

           if($access[0]['visible']==1){
           		$current=mktime();
	            if($current>$lastday){
	            	$this->flag_visible=true;
	            }else{
	            	include_once ROOT."/app/views/404.php";
	            	echo "Страница будет опубликована ". date("F j, Y, g:i a",$lastday).'<br>';
	            }
           }else{
           	$this->flag_visible=true;
           }
		}
	}
 ?>