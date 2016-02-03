<?php
class DB {
  public function connect_db(){  

$con = mysqli_connect("localhost","root","","test_shop");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  	// $con = new PDO('mysql:host=localhost;dbname=test_shop', "root","");

    // $con = mysqli_connect("localhost","root","");
    // if (!$con) {
    //     die('could not connect :' . mysql_error());
    // }

  	 
    // mysqli_select_db("test_shop", $con);
    return $con ;
  }

}
?>