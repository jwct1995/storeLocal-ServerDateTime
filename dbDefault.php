<?php
include "dbInfo.php";



$conn=new mysqli($Host,$User,$Pass);
if($conn->connect_error)
	die("Connection Failed : ".$conn->connect_error."<br>");

$sql="CREATE DATABASE ".$dbName;
if($conn->query($sql)===TRUE)
	echo"Database Create Success<br>";
else
	echo"Database Create Fail".$conn->error."<br>";

$conn=new mysqli($Host,$User,$Pass,$dbName);
if($conn->connect_error)
	die("Connection Failed : ".$conn->connect_error."<br>");

	$sql=array(

	"CREATE TABLE tblrecorddatetime(
	localDT VARCHAR(99) PRIMARY KEY,
	serverDT VARCHAR(99)
	)"

	);
foreach($sql as $s)
if($conn->query($s)===TRUE)
	echo"Table Create Success<br>";
else
	echo"Table ".$s."Create Fail".$conn->error."<br>";

$mysqli=new mysqli($Host,$User,$Pass,$dbName);
if($mysqli->connect_error)
	die("Connection Failed : ".$mysqli->connect_error."<br>");


$query="INSERT INTO tblrecorddatetime(localDT, serverDT) VALUES ('000','000')";
mysqli_query($mysqli,$query);





?>
