<?php require_once ROOT.'/view/header.php' ?>


    
    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">

    <?php require_once ROOT.'/view/sidebar.php' ?>
        <div id="content">
        	<h2>Product Details</h2>
             <?php foreach ($result_single_one as $value): ?>
                       
                         
              <div class="col col_13">
            <a  rel="lightbox[portfolio]" href="#" title="Lady Shoes"><img src="/templates/<?=$value['image'] ?>" alt="<?=$value['name'] ?>" /></a>
            </div>
                     <div class="col col_13 no_margin_right">
                <table>
                    <tr>
                        <td height="30" width="160">Price:</td>
                        <td>$<?=$value['price'] ?></td>
                    </tr>
                    <tr>
                        <td height="30">Availability:</td>
                        <td><?php if($value['status']==1){
                        echo "In Stock";
                        } 
                        else
                        { 
                        echo "No";
                        } 
                        ?> </td>
                    </tr>
                    <tr>
                        <td height="30">Model:</td>
                        <td><?=$value['name'] ?></td>
                    </tr>
                    <tr><td height="30">Quantity</td><td><input type="text" value="1" style="width: 20px; text-align: right" /></td></tr>
                </table>
                <div class="cleaner h20"></div>
                <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
            </div>       

            <div class="cleaner h30"></div>
            <h5><strong>Product Description</strong></h5>
            <p><?=$value['descr'] ?></p>
                    <?php endforeach ?>

            <div class="cleaner h50"></div>
            
            <h4>Other Products</h4>
             <?php  foreach ($result_product as $value): ?>
            
                 <?php if ($id!=$value['id']): ?>
        	<div class="col col_14 product_gallery no_margin_right">
            	<a href="<?=$value['id'] ?>"><img src="/templates/<?=$value['image'] ?>" alt="<?=$value['name'] ?>" /></a>
                <h3><?=$value['name'] ?></h3>
                <p class="product_price">$ <?=$value['price'] ?></p>
                <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>
            </div>
            <?php endif ?>   
             <?php endforeach ?>     	
           
            <a href="#" class="more float_r">View all</a>
            
            <div class="cleaner"></div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
     <?php require_once ROOT.'/view/footer.php' ?>