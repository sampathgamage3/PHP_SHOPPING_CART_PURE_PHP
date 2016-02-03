<?php

include_once 'Model/Product_model.php';

 class Product_controller {
    public $model;

    public function __construct()  
        {  
            $this->model = new Product_model();

        }
        
    function getProducts(){
        $results = $this->model->loadProducts();
        return $results;
    }
    function AddToCart($productID,$product_qty){
        $results = $this->model->AddProductsToCart($productID,$product_qty);
    }
    function getTotal(){
        $total=0;
        if(isset($_SESSION["products"]))
        {
            foreach ($_SESSION["products"] as $cart_itm)
            {
                $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                $total = ($total + $subtotal);
            }
        }
        return $total;
    }
    function viewCart($productID){
        $results = $this->model->viewProductCart($productID);
        return $results; 
    }
    function removeCart($product_code){

                if($product_code){
                foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
                {
                        if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
                                $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
                        }

                        //create a new product list for cart
                        $_SESSION["products"] = $product;
                }
                    $_SESSION['success_rmvPrd'] = "Successfully Deleted Item from cart.";
                    return true;
                    
                }
                else{
                    $_SESSION['err_rmvPrd'] = "Cannot Delete Item from cart.";
                    return false;
                    
                }
               
        }
    function checkout(){
        $results = $this->model->finalCheckout();
        return $results; 
        
    }
    function emptyCart(){
        unset($_SESSION["products"]);
    }
}
?>