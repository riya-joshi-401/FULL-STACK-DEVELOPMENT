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
                    { header("Location: employee_dashboard.html",false);}
                   elseif(startsWith($userid,"U"))
                 { header("Location: user.html",false); }
                } else{
                    echo'<script>alert("Invalid credentials!");</script>';
                }
            } else{
                echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

}

?>

