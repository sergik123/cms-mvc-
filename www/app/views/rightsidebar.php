<section id="right_sidebar">
	<div id="public">
		<h5>опубликовать <input type="button" id="chg_public"  value="^"></h5>
	</div>
	<div id="btn_public">
	<?php if($id!="update" && $template!="update"): ?>
		<input class="btn btn-info" name="save" id="save" type="submit"  value="Сохранить">
	<?php endif; ?>
		<input class="btn btn-info" name="show" id="show" type="submit"  value="Посмотреть">
		
		<div id="visible">
			<span>!</span> <label>Видимость:<b> Открыто</b><a href="#" onclick="func();">Изменить</a></label>
		</div>
		<div id="change_vis" style="display: none">
			<div class="radio">
			  <label><input id="open_check" type="radio" value="0" checked name="optradio">Открыто</label>
			</div>
			<div class="radio">
			  <label ><input type="radio" value="1" id="pass1_check" <?php if(($id=='update' && $template[0]['pass_visible']==1)||($template=='update' && $id[0]['pass_visible']==1)): ?> checked <?php endif; ?> name="optradio">Защищено паролем</label>
			</div>
			 <div id="pass_input" <?php if(($id=='update' && $template[0]['pass_visible']==1)||($template=='update' && $id[0]['pass_visible']==1)){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php }; ?> >
			  	 <label>Введите пароль <input type="text"  name="pass_check"></label>
			  </div>
			<label class="input-inline" ><input type="button" id="close_vis" value="Закрыть"></label>
		</div>
		<div id="status">
			<span>#</span> <label>Опубликовать:<b> Сразу</b><a href="#"  onclick="func_date();">Изменить</a></label> 
		</div>

		<div id="calendar_public" style="display: none">
			<div class="radio">
			  <label><input id="public_check_now" type="radio" value="0" checked name="optpublic">сразу</label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="1" <?php if(($id=='update' && $template[0]['visible']==1)||($template=='update' && $id[0]['visible']==1)): ?> checked <?php endif; ?> id="public_check" name="optpublic">по времени</label>
			</div>
		<div id="current_date" <?php if(($id=='update' && $template[0]['visible']==1)||($template=='update' && $id[0]['visible']==1)){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php }; ?> >
			<select  name="month" style="height: 26px;">
			<?php $month=array('Янв', 'Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек' ); ?>

			<?php for ($i=0; $i <12; $i++): ?>
				<?php if(($i+1)==date('n')){
					$selected='selected';
					}else{
						$selected='';
						} 
				?>
				<option  <?=$selected ?> value="<?=($i+1)?>"><?=($i+1).'-'.$month[$i]?></option>
			<?php endfor; ?>
			</select>
			<input  type="text" name="day" value="<?=date('j')?> " style="width: 25px;"> <label> , </label>
			<input  type="text" name="year" value="<?=date('Y')?> " style="width: 50px;"> <label style="font-weight: normal;"> в </label>
			<input  type="text" name="hours" value="<?=date('h')?> " style="width: 25px;"> <label style="font-weight: normal;"> : </label>
			<input  type="text" name="minuts" value="<?=date('i')?> " style="width: 25px;">
		</div>
			
		</div>
		<?php if($id!="update" && $template!="update"): ?>
		<div id="save_page">
			<input class="btn btn-info" name="public" id="sub_save_page" type="submit"  value="Опубликовать">
		</div>
	<?php endif; ?>
	<input type="hidden" name="template" value="<?php if($id=='update'){ echo $template[0]['template']; } else if($template=='update'){ echo $id[0]['template']; } else{ echo $template; }?>">

	<?php if($id=="update" || $template=="update"): ?>
		<div id="save_page">
			<input class="btn btn-info" name="update" id="sub_save_page" type="submit"  value="Обновить">
		</div>
	<?php endif; ?>

	</div>
</section>
<?php if($view=='page'): ?>
<section id="right_footer_sidebar" >
	<div id="footer_public">
		<h5>Атрибуты страницы <input type="button" id="chg_footer_public" value="^"></h5>
	</div>
	<div id="btn_footer_public">
		<h5>Шаблон страницы</h5>
	
        <?php   
        if($id=="update"){
        	$cur_templ=$template[0]['template'];
			$main_file=trim($template[0]['main_file']);
        }else{
        	$cur_templ=$template;
        }
			$dir="templates";
			$t= scandir($dir);
		?>
		<select class="form-control" name="main_file" style=" margin:30px 0px 10px 0px;">
		<?php for($i=0;$i<count($t);$i++):?>
        <?php if(!preg_match('~.php~', $t[$i])):?>
         <?php  if ($t[$i] != "." && $t[$i] != ".." && $t[$i]==$cur_templ):?>
               <?php $handle= opendir($dir.'/'.$t[$i]); ?>  
                <?php while (false !== ($file = readdir($handle))):  ?>
                 <?php if ($file != "." && $file != ".." && $file !="404.php"  && $file !="page.php"):?> 
                    	<?php  if(preg_match('~.php~', $file)):?>
                    	 	<option <?php if($file==$main_file):?> selected <?php endif; ?> value="<?=$file ?> "> <?=$file ?></option>
                    	 <?php endif; ?>
                    <?php endif; ?> 
                <?php endwhile; ?>
             <?php endif; ?>
         <?php endif; ?>
     <?php endfor; ?>
		</select>
	</div>
</section>
<?php endif; ?>

