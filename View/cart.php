<?php
$product = new Product_controller();
?>
                <div id="Test" class="container">
            <div class="row-fluid span12 form_sec">   
                <?php 
                        if(isset($_SESSION['err_rmvPrd']) && $_SESSION['err_rmvPrd'] !="") {
                         ?>
                        <div class="alert alert-error" style="margin-top:20px;">
                        <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                        <strong>Oh snap!</strong> <?php echo $_SESSION['err_rmvPrd'] ;?>
                        </div>
                        <?php
                        $_SESSION['err_rmvPrd']="";
                        }
                            ?>
                        <?php 
                        if(isset($_SESSION['success_rmvPrd']) && $_SESSION['success_rmvPrd'] !="") {
                         ?>
                        <div class="alert alert-success" style="margin-top:20px;">
                        <button data-dismiss="alert" class="close" type="button"> 	&#215;</button>
                        <strong>Well done!</strong> <?php echo $_SESSION['success_rmvPrd'] ;?>
                        </div>
                        
                        <?php
                        $_SESSION['success_rmvPrd']="";
                        }
                            ?>
                </div>
                    
                    <div class="row-fluid span12 form_sec" style="margin-top:30px;">
                        <h1 class="row-fluid span12 h1_tag">View Cart</h1>
                        <div class="row-fluid span12 form_sec">
                            <?php
                                    if(isset($_SESSION["products"]))                                         
                                    {   
                                        //session_destroy();
                                        //var_dump($_SESSION["products"]);
                                        $currency ='$';
                                        $total = 0;
                                            echo '';
                                            echo '<ul>';
                                            $cart_items = 0;
                                            foreach ($_SESSION["products"] as $cart_itm)
                                    {
                                       $product_code = $cart_itm["code"];
                                               $results = $product->viewCart($product_code);
                                               $obj = mysql_fetch_assoc($results);
//                                       ?>        
                            <li class="cart_pLi">
                                <div class="cart_pDiv">
                                    
                                    <div class="cart_pImage">
                                        <img src="img/<?php echo $obj['productImage']?>"></img>
                                    </div>
                                    <div class="cart_pTitle">
                                        <h2><?php echo $obj['productName']; ?></h2>
                                    </div>
                                    <div class="cart_pDesc">
                                        <p>
                                            <?php echo $obj['productDescription']; ?>
                                        </p>
                                        <div class="p-qty">Qty : <?php echo $cart_itm["qty"]; ?></div>
                                    </div>
                                    <?php
                                         $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                                    ?>
                                    <div class="p-price"><?php echo $currency.$subtotal; ?></div>
                                </div>
                                <form method="post" action="" class="itemdel_frm">
                                    <span class="remove-itm">
                                        <input type="hidden" name="removeItemID" value="<?php echo $product_code; ?>" />
                                        <input type="submit" class="removeProduct" name="removeProduct" value="x"></a></span>
                                </form>
                                
                            </li>
                                                
                                        
                                        <?php
                                                   
                                                    $total = ($total + $subtotal);

                                                    echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj['productName'].'" />';
                                                    echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
                                                    echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj['productDescription'].'" />';
                                                    echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
                                                    $cart_items ++;

                                    }
                                    echo '</ul>';
                                            echo '<span class="check-out-txt" style="float:right; margin-right: 17%;">';
                                            echo '<strong>Total : '.$currency.$total.'</strong>  ';
                                            echo '</span>';
                                            echo '</form>';
                                            ?>
                            <div class="checkoutbtn">
                                <form action="" method="post" name="checkoutfrm">
                                    <input type="submit" name="checkout" value="" class="checkout_btn" />
                                </form>
                            </div>
                                <?php

                                }else{
                                            echo 'Your Cart is empty'; ?>
                                            
                                            <div class="row-fluid span12 form_sec" style="margin-top:30px;">
                                            <h1 class="row-fluid span12 h1_tag">You May Also Like This</h1>
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
                                  <?php  }

                                ?>
                            
                        </div>
                    </div>
                    