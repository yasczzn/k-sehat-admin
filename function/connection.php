<?php

$dbhost = $_ENV["MYSQLHOST"];
$dbuser = $_ENV["MYSQLUSER"];
$dbpass = $_ENV["MYSQLPASSWORD"];
$dbname = $_ENV["MYSQLDATABASE"];
$dbport = $_ENV["MYSQLPORT"];

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);

if($conn->connect_error){
  die('Could not connect connect: '.$conn->connect_error);
}

?>