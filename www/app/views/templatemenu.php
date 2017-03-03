 <style>
      #navbar ul{
        display: none;
        background-color: #f90;
        position: absolute;
        top: 100%;
      }
      #navbar li:hover ul { display: block; }
      #navbar, #navbar ul{
        margin: 0;
        padding: 0;
        list-style-type: none;
      }
      #navbar {
        height: 30px;
        background-color: #666;
        padding-left: 25px;
        min-width: 470px;
      }
      #navbar li {
        float: left;
        position: relative;
        height: 100%;
      }
      #navbar li a {
        display: block;
        padding: 6px;
        width: 100px;
        color: #fff;
        text-decoration: none;
        text-align: center;
      }
      #navbar ul li { float: none; }
      #navbar li:hover { background-color: #f90; }
      #navbar ul li:hover { background-color: #666; }
 </style>
 
<?php $array_uniq=array();
	  $array_link=array();
 for ($i=0; $i <count($id); $i++) {
	array_push($array_uniq, $id[$i]['main_link']); 
	$array_uniq=array_unique($array_uniq);

	array_push($array_link, $id[$i]['main_url']); 
	$array_link=array_unique($array_link);
	
} ?>
<ul id="navbar">
	<?php for($j=0; $j<count($id);$j++): ?>
		<?php if(!empty($array_uniq[$j])): ?>
			<li><a href="<?=$array_link[$j]; ?>"><?=$array_uniq[$j]; ?></a>
				<ul>
				<?php foreach ($id as $res): ?>
					<?php if($array_uniq[$j]==$res['main_link']): ?>
							<?php if($res['back_link']!=" "): ?>
									<li><a href="<?=$res['back_url']; ?>"><?=$res['back_link']; ?></a></li>
							<?php endif; ?>
						<?php endif; ?>
		<?php endforeach; ?>
		</ul>
			</li>
		<?php endif; ?>
	<?php endfor; ?>
</ul>




    