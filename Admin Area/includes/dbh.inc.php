<?php
$dbServername = "localhost";
$dbUsername = "u532687897_layan";
$dbPassword = "Hello@world@123";
$dbName = "u532687897_layan";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){

  die("Connection failed: ".mysqli_connect_error());
}
