<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<form action="register.php" method="POST">
<table>
<tr><td colspan='2'><center><b>REGISTER STUDENT</b></center></td></tr>
<tr><td>
<label>Enter rollno:</label></td><td>
<input type="text" placeholder='student rollno' name="rno" ></td></tr>
<tr><td>
<label>Enter name:</label></td><td>
<input type="text" placeholder="student's name" name="sname" ></td></tr>
<tr><td>
<label>Enter phoneno:</label></td><td>
<input type="tel" placeholder='enter 10 digit number' pattern="[0-9]{10}" name="phnno" ></td></tr>
<tr><td>
<label>Enter address:</label></td><td>
<input type="text" placeholder='place of residence' name="addr" ></td></tr>
<tr><td colspan='2'>
<center>
<input type="submit" name="submit" class="btn" value="Insert">
</td></tr>
</table>
</form>
<?php
function go()
{
	$con=mysqli_connect("localhost","root","","nec_student_db");
	if(!$con)
	die("Couldn't connect!".mysqli_error());
	$rno=$_POST['rno'];
$sname=$_POST['sname'];
$phn=$_POST['phnno'];
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
}
if(isset($_POST['submit']))
{
	go();
}
?>
</center>
</body>
</html>