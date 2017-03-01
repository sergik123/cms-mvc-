<?php 
	class Category{
		public static function getCategory()
		{
			$link=ConnectDb::connect();
			$result_array=array();
			 $table_name='category';
			 $sql_select_user="SELECT * FROM $table_name";
			 $res=mysqli_query($link,$sql_select_user);

			 while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}
			return $result_array;
		}
	}
 ?>