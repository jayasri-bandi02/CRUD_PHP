<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
	die("Couldn't connect!".mysqli_error());
if(mysqli_query($con,"create database nec_student_db"))
{
	echo "Database created";
}
else
	echo "Error:".mysqli_error($con);
?>