<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "trackmaster");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST['email'])){
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
// Attempt insert query execution
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email','$password')";
if(mysqli_query($link, $sql)){
    
    if(mysqli_affected_rows($link)==1)
    {
        $_SESSION['login-id']=$email;
        header("Location:index.php");
    }
    else
    {
        header('Location:register.php?attempt=email');
    }
} else{
    header('Location:register.php?attempt=password');
}}

mysqli_close($link);

?>