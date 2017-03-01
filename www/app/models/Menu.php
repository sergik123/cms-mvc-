<?php 
	class Menu{
		public $link;
	public $connect;
	public function __construct(){
		$this->link=new Connectdb;
		$this->connect=$this->link->config();
		
	}
		public function save_menu($post=" "){
			$table_name='cms_menu';
			$name=addslashes($post['title_menu']);
			
			$array_links=array();
			$array_back=array();
			$cnt=0;
			foreach ($post as $key => $value) {
				if(preg_match('~main_btn~', $key)){
					$array_back[][]=$value;
					$cnt++;
				}
				
				if(preg_match('~main_lst~', $key)){
					$array_back[$cnt-1][]=$value;
				}
				
			}

			for ($i=0; $i <count($array_back); $i++) { 
			
					$link=$array_back[$i][0]; 
				      
				for ($j=1; $j < count($array_back[$i]); $j++) { 
					
				$back=$array_back[$i][$j];

					$sql_insert_user="INSERT INTO $table_name   (name_menu, 
			                                         main_link,
			                                         back_link) 
			                 VALUES('$name','$link','$back')";
			     
					$res=mysqli_query($this->connect,$sql_insert_user);
				}
			}
			for ($i=0; $i <count($array_back); $i++) { 
				if($array_back[$i][1]==NULL){
					array_push($array_links, $array_back[$i][0]);
				}	
			}
			for ($k=0; $k <count($array_links) ; $k++) { 
				$sql_insert_user="INSERT INTO $table_name   (name_menu, 
			                                         main_link,
			                                         back_link) 
			                 VALUES('$name','$array_links[$k]',' ')";
			                 
			   $res=mysqli_query($this->connect,$sql_insert_user);
			}
			mysqli_close($this->connect);
			if($res){
				return "Меню успешно создано";
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