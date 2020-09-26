<?php
$con=mysqli_connect("localhost","root","","nec_student_db");
if(!$con)
	die("Couldn't connect!".mysqli_error());
$rno=$_POST['rno'];
$sname=$_POST['sname'];
$phn=$_POST['sname'];
$addr=$_POST['addr'];
$sql="insert into student values('".$rno."','".$sname."','".$phn."','".$addr."')";
if(mysqli_query($con,$sql))
{
	if(mysqli_affected_rows($con)!=0)
	{
		echo "<h3>Inserted successfully!</h3>";
	}
	else
	{
		echo "<h3>Cannot insert!</h3>";
	}
}
	else{
	echo "<h3>Error</h3>".mysqli_error($con);
	}
?>