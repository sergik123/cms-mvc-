<?php require_once('header.php'); ?>
<form action="" method="post">
	<div id="modal" class="modal fade in" aria-hidden="false" style="display: block; ">
		<div class="row">
			<div id="form_active" class="col-sm-3 col-sm-offset-1" style="border: 2px solid black; background-color: white">
				<h3 style="border-bottom: 1px solid #e0d2d2">Эта страница защищена паролем</h3>
				<h6 style="color: gray">Введите пароль</h6>
				<input type="password" name="pass_page" class="form-control" id="url" placeholder="Введите пароль"><br>
				<div style="border-top: 1px solid #e0d2d2; margin-top: 5px;">
					<button type="button" id="close" class="btn btn-primary btn-sm"  data-dismiss="modal" onclick="click_close()">Отмена</button>
					<button type="submit" id="add_link" class="btn btn-primary btn-sm" data-dismiss="modal">Подтвердить</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	function click_close(){
		document.getElementById('modal').style.display="none";
	}
</script>

<?php require_once('footer.php'); ?>