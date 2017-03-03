<?php require_once('header.php'); ?>
<form action="/menu/edit" method="post">
<?php if($template=='all'): ?>
<h2>Вывод всех меню</h2>
  <table border=1>
	<th>Название меню</th>
	<th>Изменить</th>
	<th>Удалить</th>
	<?php foreach ($id as $value): ?>
		
		<tr>
			<td><?= $value['name_menu']; ?></td>
			<td><a href="/menu/update/<?= $value['name_menu']; ?>">Изменить</a></td>
			<td><a href="/menu/delete/<?= $value['name_menu']; ?>">Удалить</a></td>
		</tr>		

	<?php endforeach ?>
  </table>
 <?php endif; ?>

 <?php if($template=='update'): ?>
<h2>Вывод текущего меню</h2>
  <table border=1>
	<th>Главное меню</th>
	<th>Ссылка</th>
	<th>Выпадающее меню</th>
	<th>Ссылка</th>
	<th>Изменить</th>
	<th>Удалить</th>
	<?php foreach ($id as $value): ?>
		<tr>
			<td><input type="text" name="<?= 'main_link-'.$value['id_menu']; ?>" value="<?= $value['main_link']; ?>"></td>
			<td><input type="text" name="<?= 'link_btn-'.$value['id_menu']; ?>" value="<?= $value['main_url']; ?>"></td>
			<td><input type="text" name="<?= 'back_link-'.$value['id_menu']; ?>" value="<?= $value['back_link']; ?>"></td>
			<td><input type="text" name="<?= 'link_lst-'.$value['id_menu']; ?>" value="<?= $value['back_url']; ?>"></td>
			<td><input type="submit" name="updatelink-<?=$value['id_menu']?>" value="изменить"></td>
			<td><input type="submit" name="deletelink-<?=$value['id_menu']?>" value="удалить"></td>
		</tr>		
	<?php endforeach ?>
  </table>
 <?php endif; ?>
 <?php if($template=='send'): ?>
 	<h4>Меню обновлено</h4>
 	<h5>Для перехода на страницу меню нажмите на <a href="/menu/all">ссылку</a></h5>
 <?php endif; ?>
  <?php if($template=='delete'): ?>
 	<h4>Пункт меню удален</h4>
 	<h5>Для перехода на страницу меню нажмите на <a href="/menu/all">ссылку</a></h5>
 <?php endif; ?>
 <?php if($template=='deletemenu'): ?>
 	<h4>меню удалено</h4>
 	<h5>Для перехода на страницу меню нажмите на <a href="/menu/all">ссылку</a></h5>
 <?php endif; ?>
</form>
<?php require_once('footer.php'); ?>