<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "mercy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// Set parameters
if (isset($_POST['pname']))
{
$productname = $_POST['pname'];
$material = $_POST['material'];
$quantity = $_POST['quantity'];
$dimensions = $_POST['dimensions'];
$specifications = $_POST['specifications'];
// $imagep=$_FILES["image"]["name"];
if(isset($_POST["Submit"]))
{ 

  $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query="INSERT INTO otherproduct(product_name,material,quantity,dimensions,specifications,image) VALUES('$productname','$material','$quantity','$dimensions','$specifications','$file')";
  if(mysqli_query($link,$query))
  { 
     echo'<script>alert("form successfully submitted!");</script>';
   
   }
}
}
?>