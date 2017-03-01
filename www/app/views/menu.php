<?php require_once('header.php'); ?>
	<h2>Создание нового меню</h2>
	<form action="/menu/save" method="post">
	<span>Название меню </span><input type="text" name="title_menu" placeholder="Введите название меню"><br><br>
	<div id="menu_page"></div><br> <input type="submit" value="сохранить">	
	</form>
	
	<script>
		var i = document.createElement('input');
		i.setAttribute('id', 'main_btn');
        i.setAttribute('type', 'button');
        i.setAttribute('value', 'добавить пункт меню');
        document.getElementById('menu_page').appendChild(i);
        var tmp=0;
        var tmp_lst=0;
		document.getElementById('main_btn').onclick=function(){
			tmp++;

			var inp = document.createElement('input');
			inp.setAttribute('id', 'main_lst_btn');
	        inp.setAttribute('type', 'button');
	        inp.setAttribute('value', 'добавить вложенное меню');
	        inp.setAttribute('onclick', 'func_menu()');

			var i = document.createElement('input');
			i.setAttribute('name', 'main_btn'+tmp);
	        i.setAttribute('type', 'text');
	       

	        var br=document.createElement('br');
	        var br1=document.createElement('br');
	        var br2=document.createElement('br');

	        document.getElementById('menu_page').appendChild(br1);
	        document.getElementById('menu_page').appendChild(br2);
	        document.getElementById('menu_page').appendChild(i);
	        document.getElementById('menu_page').appendChild(inp);
	        document.getElementById('menu_page').appendChild(br);

	        tmp_lst=0;	         
		}

			
	function func_menu(){
			tmp_lst++;
			var i1 = document.createElement('input');
			i1.setAttribute('name', 'main_lst-'+tmp+'-'+tmp_lst);
	        i1.setAttribute('type', 'text');
	        i1.setAttribute('style', 'margin-left:30px;');

	        var br=document.createElement('br');
	        var br1=document.createElement('br');

	        document.getElementById('menu_page').appendChild(br);
	        document.getElementById('menu_page').appendChild(i1);
	        document.getElementById('menu_page').appendChild(br1);
	}
	</script>
	
<?php require_once('footer.php'); ?>