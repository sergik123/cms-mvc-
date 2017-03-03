<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php $result=$this->current_menu('link'); ?>
	<h5>выводит n-количество записей</h5>
		<?php $result=$this->the_posts(' ',3); ?>
		<?php foreach ($result as  $id): ?>
			<span>Заголовок записи </span><?=$this->post_title($id); ?><br>
			<span>Содержимое записи </span><?=$this->post_content($id); ?><br>
		<?php endforeach ?>
</body>
</html>