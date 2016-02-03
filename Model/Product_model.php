<?php

   // include 'Controller/DB.php';

 class Product_model {


    function loadProducts(){
         
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test_shop";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        var_dump($dbcon);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM tbl_products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                 $rows[] = $row;
            }
            return $rows;
        } else {
            echo "No Products In Database.";
        }

        mysqli_close($conn); 
   
        
    }
    function viewProductCart($productID){
        $sql = "SELECT productName,productImage,productDescription, productPrice FROM tbl_products WHERE productID='$productID' LIMIT 1"; 
        $rows[]='';
        // Note the use of trigger_error instead of or die. 
        $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error()); 
        
        if ($query) {
            return $query;
         }
        
    }
    function finalCheckout(){
        $falg =0;;
        if(isset($_SESSION["products"])) //if we have the session
        {
            $rows='';
            $productObj = $_SESSION["products"];
            for($i=0;$i<=count($productObj);$i++){ //loop through session array
            $itemID = $productObj[$i]['code'];
            $itemQty= $productObj[$i]['qty'];
            $buyDate= date("Y-m-d H:i:s"); 
            $user = $_SESSION['user_id'];
                
                $sql = "INSERT INTO `tbl_buy` (`tbl_users_id`, `tbl_products_id`,`product_qty`,`buy_date`)VALUES(".$user.",".$itemID.",".$itemQty.",'".$buyDate."')";
                $results = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
                if($results){
                    $falg++;
                }
                
            }
            if(count($productObj)==$falg){
                return true;
            }else{
                return false;
            }
            
        }
    }
    function AddProductsToCart($productID,$product_qty){
        
              $product_code 	= filter_var($productID, FILTER_SANITIZE_STRING); //product code
                $product_qty 	= filter_var($product_qty, FILTER_SANITIZE_NUMBER_INT); //product code
                //limit quantity for single product
                

                //MySqli query - get details of item from db using product code
                $sql = "SELECT productID,productName,productPrice FROM tbl_products WHERE productID='".$product_code."' LIMIT 1";
                $results = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
				
				$obj = mysql_fetch_assoc($results);
				
                if ($results) { //we have the product info 
					
                        //prepare array for the session variable
                        $new_product = array(array('name'=>$obj['productName'], 'code'=>$obj['productID'], 'qty'=>$product_qty, 'price'=>$obj['productPrice']));

                        if(isset($_SESSION["products"])) //if we have the session
                        {
                                $found = false; //set found item to false

                                foreach ($_SESSION["products"] as $cart_itm) //loop through session array
                                {
                                        if($cart_itm["code"] == $product_code){ //the item exist in array

                                                $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
                                                $found = true;
                                        }else{
                                                //item doesn't exist in the list, just retrive old info and prepare array for session var
                                                $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
                                        }
                                }

                                if($found == false) //we didn't find item in array
                                {
                                        //add new user item in array
                                        $_SESSION["products"] = array_merge($product, $new_product);
                                        $_SESSION['success_addTc'] = "Successfully Addred New Item for cart.";
                                }else{
                                        //found user item in array list, and increased the quantity
                                        $_SESSION["products"] = $product;
                                        $_SESSION['success_addTc'] = "Successfully Updated New Item for cart.";
                                }

                        }else{
                                //create a new session var if does not exist
                                $_SESSION["products"] = $new_product;
                                 $_SESSION['success_addTc'] = "Successfully Addred New Item for cart.";
                        }

                }

                
    }
 }
?>