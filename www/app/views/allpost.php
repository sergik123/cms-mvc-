<?php require_once('header.php'); ?>
<h2>Вывод всех статей</h2>
<table border="2">
<th>Название статьи</th>
<th>Изменить статью </th>
<th>Удалить статью </th>
<?php foreach ($template as $value): ?>
	<?php if ($value['template']==$id): ?>
		<tr>
			<td><a target="_blank" href="/post/single/<?= $value['post_link']; ?>"><?= $value['post_title']; ?></a></td>
			<td><a href="/post/update/<?= $value['post_link']; ?>">Изменить</a></td>
			<td><a href="/post/delete/<?= $value['post_link']; ?>">Удалить</a></td>
		</tr>
	<?php endif ?>	
	<?php endforeach ?>
</table>
<?php require_once('footer.php'); ?>