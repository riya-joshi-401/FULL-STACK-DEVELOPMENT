<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "mercy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// Set parameters
if (isset($_POST['productnames']))
{
$productname = $_POST['productnames'];
$material = $_POST['material'];
$quantity = $_POST['quantity'];
$dimensions = $_POST['dimensions'];
$specifications = $_POST['specifications'];
if(isset($_POST["Submit"]))
{ 

  $query="INSERT INTO product(product_name,material,quantity,dimensions,specifications) VALUES('$productname','$material','$quantity','$dimensions','$specifications')";
  if(mysqli_query($link,$query))
  { 
     echo'<script>alert("Form successfully submitted!");</script>';
   
   }
}
}
?>