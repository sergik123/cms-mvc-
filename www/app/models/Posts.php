<?php 
	class Posts{
		public function __construct(){
			$this->link=new Connectdb;
			$this->connect=$this->link->config();
		}
		/*метод отвечает за получение title из бд*/
		public  function title( $params=" ",$source=" ", $params1=" "){
			if(!empty($params1['show'])){
				if(!empty($params1['post_title']))
				return $params1['post_title'];
			}
			else{
				$table_name='cms_posts';
				$sql_select_template="SELECT `post_title` FROM $table_name WHERE `post_link`=$params";
				$res= mysqli_query($this->connect,$sql_select_template);
				if($res->num_rows!=0){
					$row=$res->fetch_assoc();
					return $row['post_title'];

				}
				mysqli_close($this->connect);
				
			}
		}
		/*метод отвечает за получение content из бд*/
		public  function content( $params=" ",$source=" ", $params1=" "){
			if(!empty($params1['show'])){
				if(!empty($params1['post_content']))
				return $params1['post_content'];
			}else{
				$table_name='cms_posts';
				$sql_select_template="SELECT `post_content` FROM $table_name WHERE `post_link`=$params";
				$res= mysqli_query($this->connect,$sql_select_template);

				if($res->num_rows!=0){
					$row=$res->fetch_assoc();

					return $row['post_content'];
				}
				mysqli_close($this->connect);
			}
		}
		/*метод отвечает за получение ссылок на статьи из бд*/
		public function _posts($id=" ",$limit=" "){
			$count='';			
			 $where='';

			 if($id!=' '){
			 	$where="WHERE `post_link`=$id";
			 }else{
			 	if($limit!=' '){
				$count=" LIMIT $limit";
				}
			 }

			 $result_array=array();
			 $table_name='cms_posts';
			 $sql_select_user="SELECT `post_link` FROM $table_name ".$where.' '.$count;
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
		/*метод отвечает за получение всех статей из бд*/
		public function all_posts($id=" "){
			  $where='';
			 if($id!=' '){
			 	$where="WHERE `post_link`='$id'";
			 }
			 $result_array=array();
			 $table_name='cms_posts';
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
		/*метод отвечает за обновление статей из бд*/
		public function update_post($post=" ", $id=" "){

			if(!empty($post['update'])){
				$table_name='cms_posts';
				$title=addslashes($post['post_title']);
				$content=addslashes($post['post_content']);
				$visible=addslashes($post['optpublic']);

				$pass_visible=addslashes($post['optradio']);
				$id=addslashes($post['post_link']);
			
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
				$sql_select_update="UPDATE $table_name  SET post_title='$title', 
															post_content='$content',
															visible='$visible',
															date_public='$date',
															page_password='$pass',
															pass_visible='$pass_visible' WHERE post_link='$id'";
				
				$res= mysqli_query($this->connect,$sql_select_update);

				if($res!=NULL){
					echo "Статья обновлена";
				}
				mysqli_close($this->connect);
			}
		}
		/*метод отвечает за удаление выбранной статьи из бд*/
		public function delete_post($id=" "){
			$post_del=$id[0]['post_link'];
			$table_name='cms_posts';
				$sql_select_delete="DELETE FROM $table_name WHERE post_link='$post_del'";				
				$res= mysqli_query($this->connect,$sql_select_delete);
				if($res->num_rows!=0){
					echo 'Выбранная статья удалена';
				}
				mysqli_close($this->connect);
		}
	}
 ?>