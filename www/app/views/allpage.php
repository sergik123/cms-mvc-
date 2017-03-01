<?php require_once('header.php'); ?>
<h4><?=$params?></h4>
<h2>Вывод всех страниц</h2>
  <table border=1>
	<th>Название страницы</th>
	<th>Изменить страницу</th>
	<th>Удалить страницу</th>
	<?php foreach ($template as $value): ?>
	<?php if ($value['template']==$id): ?>
		<tr>
			<td><a target="_blank" href="/page/single/<?= $value['page_include']; ?>"><?= $value['page_title']; ?></a></td>
			<td><a href="/page/update/<?= $value['page_include']; ?>">Изменить</a></td>
				<td><a href="/page/delete/<?= $value['page_include']; ?>">Удалить</a></td>
		</tr>		
	<?php endif ?>	
	<?php endforeach ?>
  </table>

<?php require_once('footer.php'); ?>