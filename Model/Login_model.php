<?php
 class Login_model {

     
    public function getlogin($username, $password)
    {
     
            // To protect MySQL injection
            $sql = "SELECT username,id FROM tbl_users  
        WHERE username = '" . mysql_real_escape_string($username) . "' AND password = '" .$password. "' LIMIT 1"; 
      $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error()); 

      // If one row was returned, the user was logged in! 
      if (mysql_num_rows($query) == 1) { 
        $row = mysql_fetch_assoc($query); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['loggedin'] = true; 
        $_SESSION['user_id'] =  $row['id'] ; 
        $_SESSION['error']="";
        return true; 
      } 
        $_SESSION['error_log'] = "Incorrect Username Or Password"; 

      return false;
     }
     
     function getRegister($firstName,$lastName,$email,$pUsername, $pPassword){
         
       
        $uLen = strlen($pUsername); 
        $pLen = strlen($pPassword); 

        // escape the $pUsername to avoid SQL Injections 
        $eUsername = mysql_real_escape_string($pUsername); 
        $sql = "SELECT username FROM tbl_users WHERE username = '" . $eUsername . "' LIMIT 1"; 

        // Note the use of trigger_error instead of or die. 
        $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error()); 

        // Error checks (Should be explained with the error) 
        if ($uLen <= 4 || $uLen >= 11) { 
          $_SESSION['error_reg'] = "Username must be between 4 and 11 characters."; 
        }elseif (mysql_num_rows($query) == 1) { 
          $_SESSION['error_reg'] = "Username already exists."; 
        }else { 
          // All errors passed lets 
          // Create our insert SQL by hashing the password and using the escaped Username. 
          $sql = "INSERT INTO tbl_users (`firstname`,`lastname`,`email_address`,`username`, `password`) VALUES ('".$firstName."','".$lastName."','".$email."','" . $eUsername . "', '" .$pPassword. "');"; 

          $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error()); 

          if ($query) { 
            return true; 
          }   
        } 
      
     }
    
 }
?>