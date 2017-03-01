<?php 
	class Product
	{
		const SHOW_BY_DEFAULT=9;
		public static function getAllCategoryProduct($category, $count=self::SHOW_BY_DEFAULT)
		{
			$link=ConnectDb::connect();
			$result_array=array();
			 $table_name='products';
			 $sql_select_user="SELECT * FROM $table_name WHERE category_id=\"$category\" LIMIT $count";
			 $res=mysqli_query($link,$sql_select_user);

			 while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}
			return $result_array;
		}

		public static function getOneProductFromCategory($id)
		{
			$link=ConnectDb::connect();
			$result_array=array();
			 $table_name='products';
			 $sql_select_user="SELECT * FROM $table_name WHERE id=$id";
			 $res=$link->query($sql_select_user) or die(mysql_error());

			 while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}
			$link->close();
			return $result_array;

		}
		/*Вывод товара с ограниченным количеством. Количество задается константой SHOW_BY_DEFAULT*/
		public static function getAllProduct($count=self::SHOW_BY_DEFAULT)
		{
			$link=ConnectDb::connect();
			$result_array=array();
			 $table_name='products';
			 $sql_select_user="SELECT * FROM $table_name WHERE status=1 order by RAND() LIMIT $count ";
			 $res=mysqli_query($link,$sql_select_user);

			 while($r=$res->fetch_assoc()) {
				array_push($result_array, $r);
			}  
			return  $result_array;
		}
	}
 ?>