<?php

class connect
{ private $conn;
   public function __construct() {
     $conn = new mysqli("localhost", "root", "12345") or die("connection error");
     
     mysqli_select_db($conn,"news_php") or die ("cannot select specified database");
     $this->conn=$conn;
     
 }
 public function query($sql)
 {  
     $out=mysqli_query($this->conn,$sql) ;
     return $out;

 }
 
 
}
?>
