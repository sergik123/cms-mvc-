<?php 
	class Pages{
		public function __construct(){
			$this->link=new Connectdb;
			$this->connect=$this->link->config();

		}
	/*метод отвечает за получение title из бд*/
		public  function title( $params=" ",$source=" ", $params1=" "){
			if($params=='show'){
				if(!empty($params1['page_title']))
				return $params1['page_title'];
			}
			else{
				$table_name=`cms_pages`;
				$params=$this->link_page($params);		
				$sql_select_template="SELECT `page_title` FROM `cms_pages` WHERE `page_link`=".$params[0]['page_link'];
				$res= mysqli_query($this->connect,$sql_select_template);
				
				if($res->num_rows!=0){
					$row=$res->fetch_assoc();

					return $row['page_title'];
				}
				mysqli_close($this->connect);
				
			}
		}
	/*метод отвечает за получение content из бд*/
		public  function content( $params=" ",$source=" ", $params1=" "){
			if($params=='show'){
				if(!empty($params1['page_content']))
				return $params1['page_content'];
			}else{
				$table_name='cms_pages';
				$params=$this->link_page($params);	
				$sql_select_template="SELECT `page_content` FROM $table_name WHERE `page_link`=".$params[0]['page_link'];
				$res= mysqli_query($this->connect,$sql_select_template);
				if($res->num_rows!=0){
					$row=$res->fetch_assoc();

					return $row['page_content'];
				}
				mysqli_close($this->connect);
			}
		}
	/*метод отвечает за получение поля main_file из бд*/
		public function main_file($id=" "){
			$table_name='cms_pages';
				$sql_select_template="SELECT `main_file` FROM $table_name WHERE `page_link`=$id";
				$res= mysqli_query($this->connect,$sql_select_template);
				if($res->num_rows!=0){
					$row=$res->fetch_assoc();

					return $row['main_file'];
				}
				mysqli_close($this->connect);
		}
	/*метод отвечает за получение всех страниц из бд*/
		public function all_pages($id=" "){
			 $result_array=array();
			 $table_name='cms_pages';

			 $where='';
			 if($id!=' '){
			 	$where="WHERE `page_link`=$id";
			 }
			
			 $sql_select_user="SELECT * FROM $table_name ".$where; 

			 $res= mysqli_query($this->connect,$sql_select_user);
			 if($res!=NULL){
			 	 while($r=$res->fetch_assoc()){
				array_push($result_array, $r);
				}
				
				return $result_array;
			 }else{
				return $result_array['error']=1;
			 }
			
			 mysqli_close($this->connect);
		}
	/*метод отвечает за получение всех ссылок на страницы из бд*/
		public function link_page($cart=" "){

			$result_array=array();
			$table_name='cms_pages';
				$sql_select_template="SELECT * FROM `cms_pages` WHERE `page_include`=".'\''.$cart.'\'';

				$res= mysqli_query($this->connect,$sql_select_template);
				
			if($res!=NULL){
			 	 while($r=$res->fetch_assoc()){
				array_push($result_array, $r);
				}

				return $result_array;
			}else{
				return $result_array['error']=1;
			}
			
				mysqli_close($this->connect);
		}
	/*метод отвечает за обновление страниц в бд*/
		public function update_page($post=" ",$id=" "){

			if(!empty($post['update'])){
				$table_name='cms_pages';
				$title=addslashes($post['page_title']);
				$content=addslashes($post['page_content']);
				$visible=addslashes($post['optpublic']);
				
				$main_file=addslashes($post['main_file']);

				$pass_visible=addslashes($post['optradio']);
			
			if($post['optpublic']!=0){
	    		if($post['month']<10){
	    			$month='0'.$post['month'];
	    		}else{
	    			$month=$post['month'];
	    		}

		    	$day=$post['day'];
		    	$year=$post['year'];
		    	$hours=$post['hours'];
		    	$minuts=$post['minuts'];

		    	$date=$year.'-'.$month.'-'.$day;
		    	$time=$hours.':'.$minuts.':'.date('s');
		    	$date=str_replace(' ','',$date);
		    	$time=str_replace(' ','',$time);
		    	$datetime= $date.' '.$time;
		    	
		    	$date2=strtotime($datetime);
		    	$date = date("Y-m-d H:i:s", $date2); 
    		}

	    	if($post['optradio']!=0){
	    		$pass=md5($post['pass_check']); 
	    	}
				$sql_select_update="UPDATE $table_name  SET page_title='$title', 
															page_content='$content',
															visible='$visible',
															date_public='$date',
															main_file='$main_file',
															page_password='$pass',
															pass_visible='$pass_visible' WHERE page_include='$id'";
																
				$res= mysqli_query($this->connect,$sql_select_update);
				if($res!=NULL){
					return "Страница обновлена";
				}
				mysqli_close($this->connect);
			}
		}
	/*метод удаляет выбранную страницу из бд*/
		public function delete_page($id=" "){
			$page_del=$id[0]['page_include'];
			$table_name='cms_pages';
				$sql_select_delete="DELETE FROM $table_name WHERE page_include='$page_del'";				
				$res= mysqli_query($this->connect,$sql_select_delete);
				if($res->num_rows!=0){
					echo 'Страница '.$id[0]['page_include'].'.php удалена';
				}
				mysqli_close($this->connect);
				$file='templates/'.$id[0]['template'].'/'.$page_del.'.php';
				unlink($file);
			
		}
	
	}
 ?>