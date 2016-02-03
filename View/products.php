<?php
$product = new Product_controller();

?>
                <div id="Test" class="container">
                    <div class="row-fluid span12 form_sec">    
                </div>
                    <div class="row-fluid span12 form_sec">
                        <?php 
                        if(isset($_SESSION['success_addTc']) && $_SESSION['success_addTc'] !="") {
                         ?><div class="alert alert-success" style="margin-top:30px;">
                            <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                            <strong>Well done!</strong> <?php echo $_SESSION['success_addTc'] ;?>
                        </div>
                        <?php
                        $_SESSION['success_addTc']="";
                        }
                            ?>
                        
                    </div>
                    <div class="row-fluid span12 form_sec">
                        <h1 class="row-fluid span12 ">Featured Products</h1>
                        
                        <div class="row-fluid span12 form_sec">
                            
                            <?php 
                            
                            $results = $product->getProducts();
                            for($i=0;$i<count($results);$i++){ ?>
                                <div class="row-fluid span3 product_div">
                                <form action="" method="post" name="product_frm">
                                    <input type="hidden" name="productID" value="<?php echo $results[$i]['productID'] ;?>" />
                                    <div class="p_img_div">
                                        <img src="img/<?php echo $results[$i]['productImage'] ;?>" class="prd_img" alt=""/>
                                    </div>
                                    <h5><?php echo $results[$i]['productName'] ;?></h5>
                                    <p><?php echo $results[$i]['productDescription'] ;?></p> 
                                    <span class="Price">
                                        <label style="width:20%;float:left;">Price : </label>
                                        <span style="width:20%;float:left;"><?php echo $results[$i]['productPrice'] ;?></span>
                                    </span> 
                                    <span class="qty">
                                        <label style="width:20%;float:left;">| Qty : </label>
                                        <input  style="width:20%;float:left;" type="text" name="product_qty" value="1"  />
                                    </span>
                                    <button class="addtoCart_btn" type="submit" name="addtoCart_btn" >Add</button>
                                </form>
                                </div>
                           <?php }
                            ?>
                        </div>
                    </div>