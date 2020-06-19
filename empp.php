<?php
$link=mysqli_connect("localhost","root","","mercy");
if($link==false){
  die("ERROR: Could not connect. " .mysqli_connect_error());
}
$pn = $_GET['id'];;
echo "Name of alloted product : $pn";
if($_SERVER['REQUEST_METHOD']=='GET'){
 $query = "UPDATE product set alloted=1 where product_name='$pn'";
  $result = mysqli_query($link, $query);

if (mysqli_query($link,$query)){
  echo '<script>alert("Job alloted successfully!");</script>';
}else{
  echo "Error Updating Record" . mysqli_error($link);
}
}
mysqli_close($link);
 ?>