<?php 
	class Menu{
		public function save_menu($post=" "){
			
			$name=addslashes($post['title_menu']);
			
			$array_links=array();
			$array_back=array();
			foreach ($post as $key => $value) {
				if(preg_match('~main_btn~', $key)){
					array_push($array_links, $value);
				}
				if(preg_match('~main_lst~', $key)){
					array_push($array_back, $value);
				}
			}
			

			/*$table_name='cms_menu';
			for ($i=0; $i <count($array_links) ; $i++) { 
				$link=$array_links[$i];
				$back=$array_back[$i];
				$sql_insert_user="INSERT INTO $table_name   (name_menu, 
			                                         main_link,
			                                         back_link) 
			                 VALUES('$name','$link','$back')";
			     var_dump($sql_insert_user);
			}*/
		

			/*$res= mysqli_query($this->connect,$sql_insert_user);
			mysqli_close($this->connect);
			if($res){
				return "Страница успешно создана";
			}*/
		}
	}
 ?>