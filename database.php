<?php 
 class database{   
     public $result;// Create connection
    function query($sql)
    {
    $conn = new mysqli("localhost","root","iamgod123", "fruit_market");

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $this->result = $conn->query($sql);
    

    $conn->close();
    }
}
?>