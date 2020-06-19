<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "mercy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 if(isset($_POST["insert"]))
{ $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query="INSERT INTO images(name) VALUES('$file')";
  if(mysqli_query($link,$query))
  { 
     echo"image inserted into the database";
   
   }

}
?>
