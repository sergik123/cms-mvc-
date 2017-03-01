<?php require_once ROOT.'/view/header.php' ?>
    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	<div id="product_slider">
            <div id="SlideItMoo_outer"> 
                <div id="SlideItMoo_inner">         
                    <div id="SlideItMoo_items">
                    <?php foreach ($result_product as $value): ?>
                       
                            <div class="SlideItMoo_element">
                                <a href="details/<?=$value['id'] ?>" target="_parent">
                                <img src="/templates/<?=$value['image'] ?>" alt="<?=$value['name'] ?>" /></a>
                            </div>
                        
                    <?php endforeach ?>
                    </div>          
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
        
        
       <?php require_once ROOT.'/view/sidebar.php' ?>
        
        <div id="content">
        <?php foreach ($result_category_one as $value):?>
        	<div class="col col_14 product_gallery no_margin_right">
            	<a href="/details/<?=$value['id'] ?>"><img src="/templates/<?=$value['image'] ?>" alt="<?=$value['name'] ?>" /></a>
                <h3><?=$value['name'] ?></h3>
                <p class="product_price">$ <?=$value['price'] ?></p>
                <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
            </div>  
            <?php endforeach; ?>      	
            <div class="cleaner"></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
<?php require_once ROOT.'/view/footer.php' ?>