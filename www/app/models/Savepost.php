<?php

/**
 * add saved post in database
 *
 * @author sergey
 */
class Savepost {
	public $link;
	public $connect;
	public function __construct(){
		$this->link=new Connectdb;
		$this->connect=$this->link->config();
		
	}
	/*метод отвечает за сохранение статей в бд*/
    public function save($post=' ', $link=' ',$template=" "){
    	$title=htmlspecialchars($post['post_title']);
    	$content=$post['post_content'];
    	$main_file=$post['main_file'];
    	$visible=$post['optpublic'];
    	$pass_visible=$post['optradio'];
    	$url=$link;
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
    	$table_name='cms_posts';

		$sql_insert_user="INSERT INTO $table_name   (post_title, 
			                                         post_content,
			                                         visible,
			                                         date_public,
			                                         main_file,
			                                         page_password,
			                                         pass_visible,
			                                         post_link,
			                                         template) 
			                 VALUES('$title','$content','$visible','$date','$main_file','$pass','$pass_visible','$url','$template')";

			$res= mysqli_query($this->connect,$sql_insert_user);
			mysqli_close($this->connect);
			if($res){
				return "Запись успешно создана";
			}
    }
}
