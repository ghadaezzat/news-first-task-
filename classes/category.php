<?php
include_once 'connect.php';
class Category
{  private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }


    
 public function getdata()
 {
    $data=$this->conn->query("select * from categories ") or die("query failed"); 
    $rows = [];
    while($row = mysqli_fetch_assoc($data))
    {
        $rows[] = $row;
    }
    return $rows;

  }



}

?>

