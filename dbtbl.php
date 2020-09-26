<?php
$con=mysqli_connect("localhost","root","","nec_student_db");
if(!$con)
	die("Couldn't connect!".mysqli_error());
$sql="create table student(rollno char(10)primary key,sname varchar(20) not null,phn char(10) not null,address varchar(15)not null)";
if(mysqli_query($con,$sql))
{
	echo "table created";
}
else
	echo "Error:".mysqli_error($con);
?>