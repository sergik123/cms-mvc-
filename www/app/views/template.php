<?php require_once('header.php'); ?>
<h3 style="text-align: center;">шаблоны</h3>
<?php 
      $dir="templates";
	  $t= scandir($dir);
 ?>
 <ul>
 	<?php for($i=0;$i<count($t);$i++):?>
        <?php if(!preg_match('~.php~', $t[$i])):?>
         <?php  if ($t[$i] != "." && $t[$i] != ".."):?>
            <li style="float: left; list-style-type: none;">
            <form action="" method="post">
            	 <div style="margin-left: 60px;">
                	<img style="width: 300px;" src="/templates/<?=$t[$i];?>/screenshot.png" alt="картинка не найдена">
                	<p style="background-color: black; color: white; font-weight: bold;"><?=$t[$i];?></p>
                	
                	<?php if($id==$t[$i]): ?> 
                		<label>активная тема</label> 
                	<?php endif; ?>
                	
                	<input type="hidden" name="active" value="<?=$t[$i]?>">
                	<input name="active_template" style="float: right;" class="btn btn-info" type="submit" value="Активировать">
               </div>
            </form>
              
            </li>
             <?php endif; ?>
         <?php endif; ?>
     <?php endfor; ?>
 </ul>
<?php require_once('footer.php'); ?>