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
  $query="INSERT INTO otherproduct(image) VALUES('$file')";

$sql="INSERT INTO otherproduct(product_name,material,quantity,dimensions,specifications) VALUES(?,?,?,?,?)";
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssiss", $productname,$material,$quantity,$dimensions,$specifications);


    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt) && mysqli_query($link,$query)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}

// Close statement
mysqli_stmt_close($stmt);
mysqli_close($link);
}
}
?>