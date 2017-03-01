<?php require_once('header.php'); ?>
<h2>Создание новой записи</h2>
<?php $r1=" ";$r2=" "; $r1=rand(1000,9000).'-'.rand(1,9);  $r2=explode('-',$r1);?>


<form action="/post/show/<?=$r2[0];?>" method="post" target="_blank">
<?php require_once('rightsidebar.php'); ?>
<section id="create_page">

	<h4>Заголовок Записи</h4>
	<input type="text" id="title_page" name="post_title" value="<?php if(!empty($id[0]['post_title'])) echo $id[0]['post_title'];?>" placeholder="Введите заголовок"><br><br><br>
	<input type="hidden" name="post_link" value="<?php if(!empty($id[0]['post_link'])) echo $id[0]['post_link'];?>">
	<h4>Содержимое записи</h4>
	<div style="margin-bottom: 10px;">
		<input type="button" class="btn_editor" id="bold" value="b">
		<input type="button" class="btn_editor" id="em" value="i">
		<input type="button" class="btn_editor" id="link" href="#modal" data-toggle="modal" value="link">
		<input type="button" class="btn_editor" id="quote" value="quote">
		<input type="button" class="btn_editor" id="del" value="del">
		<input type="button" class="btn_editor" id="ins" value="ins">
		<input type="button" class="btn_editor" id="img" href="#imgmodal" data-toggle="modal" value="img">
		<input type="button" class="btn_editor" id="ul" value="ul">
		<input type="button" class="btn_editor" id="ol" value="ol">
		<input type="button" class="btn_editor" id="li" value="li">
	</div>
	<textarea name="post_content" id="page_content" cols="30" rows="30" placeholder="Введите содержимое статьи"  placeholder="Введите заголовок"><?php if(!empty($id[0]['post_content'])) echo $id[0]['post_content'];?></textarea>
	
</section>
</form>
	<div id="modal" class="modal fade in" aria-hidden="false" style="display: none; ">
		<div class="row">
			<div id="form_active" class="col-sm-3 col-sm-offset-1" style="border: 2px solid black; background-color: white">
				<h3 style="border-bottom: 1px solid #e0d2d2">Вставить ссылку</h3>
				<h6 style="color: gray">Введите адрес назначения(URL)</h6>
				<input type="text" name="url" class="form-control" id="url" placeholder="Введите url"><br>
				<input type="text" name="link_txt" class="form-control" id="link_txt" placeholder="Введите текст ссылки"><br>
				<label><input type="checkbox" id="chk_new" value="">Открывать в новой вкладке</label>
				<div style="border-top: 1px solid #e0d2d2; margin-top: 5px;">
					<button type="button" id="close" class="btn btn-primary btn-sm"  data-dismiss="modal">Отмена</button>
					<button type="button" id="add_link" class="btn btn-primary btn-sm" data-dismiss="modal">Добавить ссылку</button>
				</div>
			</div>
		</div>
	</div>

		<div id="imgmodal" class="modal fade in" aria-hidden="false" style="display: none;">
		<div class="row">
			<div id="form_active" class="col-sm-3 col-sm-offset-1" style="border: 2px solid black; background-color: white">
				<h3 style="border-bottom: 1px solid #e0d2d2">Вставить картинку</h3>
				<h6 style="color: gray">Введите адрес картинки(URL)</h6>
				<input type="text" name="url_img" class="form-control" id="url_img" placeholder="Введите url картинки"><br>
				<input type="text" name="link_img" class="form-control" id="link_img" placeholder="Введите описание картинки"><br>
				<div style="border-top: 1px solid #e0d2d2; margin-top: 5px;">
					<button type="button" id="close_img" class="btn btn-primary btn-sm"  data-dismiss="modal">Отмена</button>
					<button type="button" id="add_img" class="btn btn-primary btn-sm" data-dismiss="modal">Добавить картинку</button>
				</div>
			</div>
		</div>
	</div>
<?php require_once('footer.php'); ?>