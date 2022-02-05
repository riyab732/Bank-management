<?php
$server="localhost";
$username="root";
$password="";
$db="banking";

$conn = mysqli_connect($server,$username,$password,$db);
if($conn)
{

}
else{
    die("Database connection error : " .mysqli_connect_error());
}
// session_start();
?>