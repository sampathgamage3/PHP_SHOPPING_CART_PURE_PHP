<?php 

include "app/config.php";
//include "app/detect.php";

var_dump($page_name);

include 'header.php';
if ($page_name=='') {
   
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='login.html' || $page_name=='login.php') {
         if(isset($_REQUEST['login_submit'])){
            include_once("Controller/Login_controller.php");

            $Login = new Login_controller();
            $result = $Login->validateUser($_REQUEST['modlgn_username'],$_REQUEST['modlgn_passwd']);
           
            if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
                header('Location: products.php');
            }else{
                include $browser_t.'/login.php';
            }
        }
            else{
               include $browser_t.'/login.php'; 
            }
	
	}
elseif ($page_name=='products.html' || $page_name=='products.php') {
    $product = new Product_controller();
	if(isset($_REQUEST['addtoCart_btn'])){
            if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
                $resuls=$product->AddToCart($_REQUEST['productID'],$_REQUEST['product_qty']);
		header('Location: products.php');
            }else{
                 header('Location: login.php');
            }
		
	}
	include $browser_t.'/products.php';
	}
elseif ($page_name=='register.html') {
        if(isset($_REQUEST['reg_submit'])){
          $Login = new Login_controller();
          $result = $Login->createAccount($_REQUEST['reg_first_name'],$_REQUEST['reg_last_name'],$_REQUEST['reg_email'],$_REQUEST['reg_username'],$_REQUEST['reg_password']);
          
          if($_SESSION['error_reg']!=""){
               include $browser_t.'/register.php';
          }else{
              $_SESSION['success'] = "You are succesfully registerd.Please Login";
              header('Location: login.php');
          }
        }else{
            include $browser_t.'/register.php';
        }
        }
elseif ($page_name=='cart.html' || $page_name=='cart.php') {
        $product = new Product_controller();
	if(isset($_REQUEST['addtoCart_btn'])){
            if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
                $resuls=$product->AddToCart($_REQUEST['productID'],$_REQUEST['product_qty']);
		header('Location: products.php');
            }else{
                 header('Location: login.php');
            }
		
	}
        if(isset($_REQUEST['removeProduct'])){
            if(isset($_REQUEST['removeItemID']) && $_REQUEST['removeItemID']!=""){
                $resuls=$product->removeCart($_REQUEST['removeItemID']);
                if($resuls){
                    header('Location: cart.php');
                }
                else {
                    header('Location: cart.php');
                }
            }
        }
        if(isset($_REQUEST['checkout'])){
             $resuls=$product->checkout();
             if($resuls){
                $retrn = $product->emptyCart();
                header('Location: cart.php');
              }
        }
	include $browser_t.'/cart.php';
	}
elseif ($page_name=='logout.html') {
	$Login = new Login_controller();
        $Login->logoutUser();
        header('Location: login.php');
	}
else
	{
	include $browser_t.'/404.html';
	}
include 'footer.php';
?>
