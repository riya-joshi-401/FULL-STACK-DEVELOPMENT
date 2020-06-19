<?php
$email=$_POST['email'];
$psw=$_POST['psw'];

$conn=new mysqli("localhost","root","","internship") ;
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$sql = "INSERT INTO signup (email,psw)
VALUES ('email','psw')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

 
