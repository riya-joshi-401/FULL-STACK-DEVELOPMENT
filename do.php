<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body{
background-image:url("https://www.industrialheating.com/ext/resources/Issues/Issues2/2017/Nov/ih1117-MFJ-lead-900.jpg");
background-size:cover;
background-repeat: no-repeat;
background-position: center;
}
#Form{
margin-left:75.3333333333%;
margin-right: 5%;
margin-top: 4%;
display: block;
border: solid violet 2px ;
text-align: center;
padding-top: 50px;
padding-bottom: 50px;
background-color: white;
}
#Button{
border: solid violet 1px;
border-radius: 18px;
padding: 13px;
padding-left: 15px;
padding-right: 20px;
color: white;
background-color: purple;
}
#Button a:link{
text-decoration: none;
display: block;
}
#Button:hover{
color: violet;
}
h1{
text-align: center;
color: white;
font-family: cursive;
font-weight: 600;
}
#ep:hover{
border: 0px;
border-bottom: solid purple 2px;
}
.footer {
position: fixed;
left: 0;
bottom: 0;
width: 100%;
}
.footer a{ font-size:25px;
font-family:Arial;
}
</style>
<title></title>
</head>
<body>
<div id="Form">
<form action="#" method="post">
<h3>SIGN IN</h3>
<h5 >Sign in using your Riya Steels Account</h5>
<input type="text" name=userid placeholder="User ID" id="ep" autocapitalize="none" autocorrect="off" style="border-color: violet; padding:8px; " />
<br>
<br>
<input type="password" name=password placeholder="password" id="ep" autocorrect="off" style="border-color: violet; padding:8px;" />
<br>
<br>
<input type="submit" id="Button" value="Sign In" />
</form>
<br>
<a href="#" id="Fo" style="text-decoration: none; color: purple;">Difficulty signing in?</a>
<br>
<br>
<br>
<a href="/account/create?specId&#x3D;yidReg" id="Button" role="button" style="text-decoration: none; ">Create account</a>
</div>
<center>
<div class="footer" >
<a href="https://policies.oath.com/ie/en/oath/terms/otos/index.html" target="_blank" style="color:black; text-decoration:none;">Terms</a>
<span>|</span>
<a href="https://policies.oath.com/ie/en/oath/privacy/index.html" target="_blank" style="color:black; text-decoration:none;">Privacy</a>
</div>
</center>
</body>
</html>

<?php
$link = mysqli_connect("localhost", "root", "", "mercy");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Define variables and initialize with empty values
$userid ="";
$email="";

$regex="/^E/";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["userid"]))){
        echo"Please fill username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM signin WHERE userid = ? and password=?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);
            
            // Set parameters
            $param_username = trim($_POST["userid"]);
          
            $param_password = trim($_POST["password"]);  
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
             if(mysqli_stmt_num_rows($stmt) == 1){
                    echo"Sign in successfull.";
                    $userid = trim($_POST["userid"]);
                    function startsWith ($string, $startString) 
                       { 
                          $len = strlen($startString); 
                          return (substr($string, 0, $len) === $startString); 
                                 } 
                   // Main function 
                  if(startsWith($userid,"A")) 
                    { header("Location: admin.html",false);}
                  elseif(startsWith($userid,"E"))
                    { header("Location: try_emp.html",false);}
                  else
                 { header("Location: try_user.html",false); }
                } else{
                    echo"Invalid";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

}

?>

