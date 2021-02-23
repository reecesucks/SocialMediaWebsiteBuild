<?php
ob_start(); //Turns on output buffering
session_start();

$time_zone= date_default_timezone_set("Pacific/Auckland");
$con = mysqli_connect("localhost", "root", "password", "social");
//test for website

if(mysqli_connect_errno()){
  echo "failed: " . mysqli_connect_errno();
}

?>
