<?php 
//connect database
$condb= mysqli_connect("localhost","root","passpord","threemusketeers") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');

function checkLogin(){
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }
}
?>