<?php require_once('header.php'); ?>
<section>
	<h1>Моя cms система</h1>
	<p>Данная система была создана по образу и подобию Wordpress. Здесь также как и там можно добавлять посты и страницы. Формировать и выводить меню. Есть меню настроек и меню пользователя. Можно настраивать заголовок сайта и многое другое. Также можно добавлять темы и создавать свои. </p>
<hr>
<h3>Создание темы</h3>
	<p>Для создания темы: необходимо сначала поместить ее в папку templates. После этого добавленная тема отобразится во вкладке "Все темы". В теме должнен быть как минимум один файл - index.php </p>
	<hr>
<h3>Создание меню</h3>
	<p>Для создания меню: перейдите в пункт "меню" и заполните необходимые поля. Также любой пункт меню можно при необходимости редактировать или удалять. Вывести меню можно написав на любой странице эту функцию.:</p>
	<pre>
	<h5>вывод меню на страницу (Внимание!!! Вместо 'link' в скобках напишите название меню, которое вы хотите вывести)</h5>
	    <?php echo 'echo $this->current_menu(\'link\');';?>
	</pre>
	<hr>
	<h3>Добавление и редактирование страниц и статей</h3>
	<p>Для добавления  страниц или статей необходимо: перейти в соответствующий пункт меню и заполнить необходимые поля. Для редактирования статей или страниц необходимо нажать на нужную вам ссылку и перейти к редактированию контента. Вывести заголовок статьи можно написав на любой странице эту функцию "$this->post_title($id);". Вместо id напишите id статьи, которую вы хотите вывести. Для вывода текста статьи напишите функцию "$this->post_content($id);".</p>
	<p>Для вывода названия страницы напишите функцию "$this->page_title($id);" Чтобы вывести содержимое страницы напишите "$this->page_content($id);"</p>

	<p>Ниже представлены примеры возможных конструкций:</p>
	<pre>
	<h5>вывод текущей страницы</h5>
	    <?php echo '    echo $this->page_title($id);';?><br>
		<?php echo 'echo $this->page_content($id);';?><br>
	</pre>
		<hr>
	<pre>
		<h5>вывод всех страниц</h5>
		<?php echo '$result=$this->the_pages();'?><br>
		<?php echo  'foreach ($result as  $id){';?><br>
		<?php echo 'echo $this->page_title($id)';?><br>
		<?php echo 'echo $this->page_content($id)';?><br>
		<?php echo '}';?>
	</pre>
		<hr>
	<pre>
		<h5>выводит n-количество записей</h5>
		<?php echo  '$result=$this->the_posts(\' \',3);'; ?><br>
		<?php echo 'foreach ($result as  $id){'; ?><br>
		<?php echo 'echo $this->post_title($id)'; ?><br>
		<?php echo 'echo $this->post_content($id)'; ?><br>
		<?php echo '}';?>
	</pre>	
	<hr>
	<pre>
		<h5>выводит одну запись по её id </h5>
		<?php echo 'echo $this->post_title(4);'; ?><br>
		<?php echo 'echo $this->post_content(4);'; ?><br>
	</pre>

<hr>
	<h3>Дополнительная информация</h3>
	<p>Для того чтобы эта cms работала корректно, скачайте и импортируйте базу данных. Также не забудьте изменить название вашей базы данных в файле app/config/connectdb.php (строка 13 в файле)</p>
</section>
	
<?php require_once('footer.php'); ?>