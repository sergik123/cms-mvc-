<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<?php $this->current_menu('link'); ?>
	
			<span>Заголовок записи </span><?=$this->post_title($id); ?><br>
			<span>Содержимое записи </span><?=$this->post_content($id); ?><br>
		
</body>
</html>