<?php

include_once 'Model/Login_model.php';

 class Login_controller {
    public $model;

    public function __construct()  
        {  
            $this->model = new Login_model();

        }
        
    public function loggedIn() { 
      // check both loggedin and username to verify user. 
      if (isset($_SESSION['loggedin']) && isset($_SESSION['username']) && isset($_SESSION['user_id'])) { 
        return true; 
      } 

      return false; 
    } 
    
    function validateUser($pUsername, $pPassword) { 
      // See if the username and password are valid. 
      $result =  $this->model->getlogin($pUsername, $pPassword);
      return $result;
    } 
    
    function logoutUser() { 
      // using unset will remove the variable 
      // and thus logging off the user. 
      unset($_SESSION['username']); 
      unset($_SESSION['loggedin']); 
      unset($_SESSION['user_id']); 
      unset($_SESSION['products']); 

      return true; 
    } 

    function createAccount($firstName,$lastName,$email,$pUsername, $pPassword) { 
      // First check we have data passed in. 
      $result =  $this->model->getRegister($firstName,$lastName,$email,$pUsername, $pPassword) ;
      if($result){
      }else{
        return false;
      }
    } 
}
?>