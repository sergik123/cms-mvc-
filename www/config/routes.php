<?php
/* Файл в котором прописана логика всего сайта. 
 * По заданному пути подключается свой контроллер и action
*/ 
	return array(
		'details/([0-9]+)'=>'product/single/$1',
		'category/([0-9]+)'=>'product/view/$1',
		'products/all'=>'product/list',
		''=>'product/list',
		)
 ?>