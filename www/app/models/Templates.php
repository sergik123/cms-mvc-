<?php 
	class Templates{
		public $link;
		public $connect;
		public function __construct(){
			$this->link=new Connectdb;
			$this->connect=$this->link->config();
			
		}
		public function save($post=' '){
			$post=htmlspecialchars($post);
			$table_name='cms_template';
			$sql_delete="TRUNCATE TABLE $table_name";
			mysqli_query($this->connect,$sql_delete);

			$sql_insert_user="INSERT INTO $table_name (template_title ) 
			                 VALUES('$post')";
			$res= mysqli_query($this->connect,$sql_insert_user);

			mysqli_close($this->connect);
		}
		public function get_active_template(){
			$table_name='cms_template';
			$sql_select_template="SELECT `template_title` FROM $table_name";
			$res= mysqli_query($this->connect,$sql_select_template);
			if($res->num_rows!=0){
				$row=$res->fetch_assoc();

				return $row['template_title'];
			}else{
				return $res='landing';
			}
			mysqli_close($this->connect);
		}
	}
 ?>