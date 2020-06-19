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
<style>

body{
        background-image:url("tp.jpg");
        background-size:cover;
        background-repeat: no-repeat;
        background-position: center;
        background-color: rgba(255,255,255,0.2);
        background-blend-mode: lighten;
      }
h1{ 
  color: black;
  text-shadow: 1px 1px 2px white, 0 0 25px yellow, 0 0 5px red;}
#form{
   font-family:Arial ;
   font-size:20px;
   border:1px solid;
   width:320px;
   padding:20px;
   margin:30px auto;
   width:20%;
   border-radius:15px;
   background-color:#FAF0E6;}
button{ border: none;
        padding: 15px 25px;
        text-align: center;
        cursor: pointer;
        border-radius:10px;
}

</style>


</head>

<body >
<div id="form">
<form method="POST" action="cloned.php" id="my" enctype="multipart/form-data">
  
    <h1> Other </h1>

    <hr>
    <b>Product Name:</b>
<input style="height:25px;" type="text" placeholder="Enter product name" name="pname" id="pname" required></input>
    <br>
<br>
     <label><b>Material:</b>
<br>
<input style="height:25px;" list="material" name="material" /></label>
<datalist id="material">
  <option value="Stainless Steel">
  <option value="Carbon Steel">
  <option value="Alloy Steel">
  <option value="Tool Steel">
</datalist>
    <br>
<br>
    <b>  Quantity : </b>
    <br>
    <input style="height:25px;" type="text" placeholder="Enter quantity" name="quantity" id="quantity"  required></input>
    <br>
    <br>
    <b>Dimensions</b>
    <br>
    <input style="height:25px;" type="text" placeholder="l*h*b or r(in mm)" name="dimensions" id="dimensions" required></input>
    <br>
    <br>
    <b> Any specifications : </b>
    <br>
    <input style="height:25px;" type="text" placeholder="Enter any specifications" name="specifications" id="specifications" required></input>
    <br>
    <br>
    <b> Upload image : </b>
    <input type="file" name="image" id="image">
    <br>
    <br>
      <button type="button" style="background-color:#800000;color:white;" ><b> Cancel<b></button>
      <button type="submit" name="Submit" value="Submit" style="background-color:#191970;color:white;"><b>Submit<b></button>

 
</form>
</div>
<script>
function f() {
  alert("Form submitted sucessfully!");
}
</script>

</body>
</html>
