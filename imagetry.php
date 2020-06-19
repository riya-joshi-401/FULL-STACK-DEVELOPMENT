<!DOCTYPE html>
<html>
<head>
<script>
$(document).ready(function(){ 
       $('#insert').click(function(){
               var image_name=$('#image').val();
               if(image_name=='')
               { 
                    alert("Please select an image");
                    return false;
               }
               else
               { 
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
                     { alert('invalid image file');
                        $('#image').val('');
                        return false;
                                }
}
});
});
</script>
</head>
<body>
<form method="POST" action="img.php" enctype="multipart/form-data">
 
<input type="file" name="image" id="image">
    <br>

     <input type="submit" name="insert" id="insert" value="Insert">
</form>
<?php  
 $link = mysqli_connect("localhost", "root", "", "mercy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}               


$query = "SELECT * FROM images ";  
                $result = mysqli_query($link, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                } 
 
 ?>  


     
</body>
</html>