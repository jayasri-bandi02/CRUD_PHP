<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<form action="delete.php" method="POST">
<table>
<tr><td colspan='2'><center><b>DELETE A RECORD</b></center></td></tr>
<tr><td>
<label>Enter rollno:</label></td><td>
<input type="text" placeholder='student rollno' name="rno" ></td></tr>
<tr><td colspan='2'>
<center>
<input type="submit" name="del" class="btn" value="Delete Record">
</td></tr>
</table>
</form>
<?php
	$con=mysqli_connect("localhost","root","","nec_student_db");
	if(!$con)
	die("Couldn't connect!".mysqli_error());
if(isset($_POST['del']))
{
	$rno=$_POST['rno'];
	$sql="delete from student where rollno='".$rno."'";
	if($result=mysqli_query($con,$sql))
	{
	if(mysqli_affected_rows($con)>0)
	{
		echo "Deleted successfully!";
	}
	else{
	echo "<h3>Not found!</h3>";
	}
	}
	else{
	echo "<h3>Error</h3>".mysqli_error($con);
	}
}
?>
</center>
</body>
</html>