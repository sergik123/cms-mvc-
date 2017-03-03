<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php $result=$this->current_menu('link'); ?>
		<h5>текущая страница</h5>
		
	
			<span>Заголовок страницы </span><?=$this->page_title($id); ?><br>
			<span>Содержимое страницы </span><?=$this->page_content($id); ?><br>
		

		
		<hr>
		<h5>все страницы</h5>
		<?php $result=$this->the_pages(); ?>
		<?php foreach ($result as  $id): ?>
			<span>Заголовок страницы </span><?=$this->page_title($id); ?><br>
			<span>Содержимое страницы </span><?=$this->page_content($id); ?><br>
		<?php endforeach ?>

		
		<hr>
		<h5>выводит n-количество записей</h5>
		<?php $result=$this->the_posts(' ',3); ?>
		<?php foreach ($result as  $id): ?>
			<span>Заголовок записи </span><?=$this->post_title($id); ?><br>
			<span>Содержимое записи </span><?=$this->post_content($id); ?><br>
		<?php endforeach ?>
			
		<hr>
		<h5>выводит одну запись по её id </h5>
		<span>Заголовок записи </span><?=$this->post_title(4); ?><br>
		<span>Содержимое записи </span><?=$this->post_content(4); ?><br>
		
</body>
</html>