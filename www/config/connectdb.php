<?php 
/*Подключение к базе данных
 * Для использования этого класса необходимо написать $link=ConnectDb::connect();
*/
class connectDb{
	public static function connect(){
		$configs = array(
			    'host' => 'localhost',
			    'username' => 'root',
			    'userpassword'=>'',
			    'db'=>'mydatabase'
			);
	$link = new mysqli($configs['host'], $configs['username'], $configs['userpassword'], $configs['db']);
			mysqli_query($link,"SET NAMES 'utf8'"); 
			mysqli_query($link,"SET CHARACTER SET 'utf8'");
			mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
			return $link;
	}
}
	
 ?>