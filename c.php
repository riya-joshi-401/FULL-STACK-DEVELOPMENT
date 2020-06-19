<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "mercy");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['name']))
{

$name =$_POST['name'];
$email = $_POST['email'];
$userid =$_POST['userid'];
$password = $_POST['password'];
$address =$_POST['address'];
$zipcode =$_POST['zipcode'];
if(isset($_POST["Submit"]))
{ 

  $query="INSERT INTO signin(name, email, userid, password, address, zipcode) VALUES ('$name','$email','$userid','$password','$address','$zipcode')";
  if(mysqli_query($link,$query))
  { 
     echo'<script>alert("Form successfully submitted!");</script>';
   
   }
}
}
?>