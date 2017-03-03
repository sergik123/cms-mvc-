<?php 
	class Menu{
		public $link;
	public $connect;
	public function __construct(){
		$this->link=new Connectdb;
		$this->connect=$this->link->config();
		
	}
	/*метод отвечает за сохранение меню в базе данных*/
		public function save_menu($post=" "){
			
			$table_name='cms_menu';
			$name=addslashes($post['title_menu']);
			
			$array_links=array();
			$array_back=array();
			$array_links_url=array();
			$array_back_url=array();
			$cnt=0;
			foreach ($post as $key => $value) {
				if(preg_match('~main_btn~', $key)){
					$array_back[][]=$value;
					$cnt++;
				}
				
				if(preg_match('~main_lst~', $key)){
					$array_back[$cnt-1][]=$value;
				}
				if(preg_match('~link_btn~', $key)){
					$array_back[$cnt-1][]=$value;
					
				}
				if(preg_match('~link_lst~', $key)){
					$array_back[$cnt-1][]=$value;
				}
			}
			for ($i=0; $i <count($array_back); $i++) { 			
					$link=$array_back[$i][0]; 
					$link_url=$array_back[$i][1];				
				      
				for ($j=1; $j < count($array_back[$i]); $j+=2) { 
					
				$back=$array_back[$i][$j+1];
				$back_url=$array_back[$i][$j+2];
					
				$sql_insert_user="INSERT INTO $table_name   (name_menu, 
			                                         main_link,
			                                         back_link,
			                                         main_url,
			                                         back_url) 
			                 VALUES('$name','$link','$back','$link_url','$back_url')";
			    
					$res=mysqli_query($this->connect,$sql_insert_user);
				}
			}
			mysqli_close($this->connect);
			if($res){
				return "Меню успешно создано";
			}
		}
	/*метод отвечает за получение имени меню из бд*/
		public function get_name_menu($name=" "){
			
			$table_name='cms_menu';
			$result_array=array();
			$sql_select_template="SELECT DISTINCT `name_menu` FROM `$table_name`";
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
	/*метод отвечает за получение данных о нужном меню из бд*/
		public function get_current_menu($name=" "){
			$table_name='cms_menu';
			$result_array=array();
			$sql_select_template="SELECT * FROM `$table_name` WHERE `name_menu`='$name'";
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
	/*метод отвечает за обновление пунктов меню в бд*/
		public function update_link_menu($id=" ",$mainlink=" ", $backlink=" ",$urllink=" ", $backurllink=" "){
			$id=htmlspecialchars($id);
			$mainlink=htmlspecialchars($mainlink);
			$backlink=htmlspecialchars($backlink);
			
			$urllink=htmlspecialchars($urllink);
			$backurllink=htmlspecialchars($backurllink);

			$table_name='cms_menu';
			$result_array=array();
			$sql_select_update="UPDATE $table_name  SET main_link='$mainlink', back_link='$backlink',main_url='$urllink', back_url='$backurllink' WHERE id_menu='$id'";

			$res= mysqli_query($this->connect,$sql_select_update);
			
			mysqli_close($this->connect);

			if($res){
				return "Меню успешно обновлено";
			}
		}
	/*метод отвечает за удаление пунктов меню из бд*/
		public function delete_link_menu($id=" "){
			$id=htmlspecialchars($id);
			$table_name='cms_menu';
				$sql_select_delete="DELETE FROM $table_name WHERE id_menu='$id'";				
				$res= mysqli_query($this->connect,$sql_select_delete);
				mysqli_close($this->connect);	
		}
	/*метод отвечает за удаление меню из бд*/
		public function delete_menu($id=" "){
			$id=htmlspecialchars($id);
			$table_name='cms_menu';
				$sql_select_delete="DELETE FROM $table_name WHERE name_menu='$id'";				
				$res= mysqli_query($this->connect,$sql_select_delete);
				mysqli_close($this->connect);	
		}
	}
 ?>