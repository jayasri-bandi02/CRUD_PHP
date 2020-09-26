<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<form action="retrieve.php" method="POST">
<table>
<tr><td colspan='2'><center><b>STUDENT DETAILS</b></center></td></tr>
<tr><td>
<label>Enter rollno:</label></td><td>
<input type="text" placeholder='student rollno' name="rno" ></td></tr>
<tr><td colspan='2'>
<center>
<input type="submit" name="sel" class="btn" value="Get Details">
</td></tr>
</table>
</form>
<?php
	$con=mysqli_connect("localhost","root","","nec_student_db");
	if(!$con)
	die("Couldn't connect!".mysqli_error());
if(isset($_POST['sel']))
{
	$rno=$_POST['rno'];
$sql="select * from student where rollno='".$rno."'";
if($result=mysqli_query($con,$sql))
{
	if($row=mysqli_fetch_array($result))
	{
		echo "<table border='1'><tr><th>RollNo</th><th>Name</th><th>PhoneNo</th><th>Address</th></tr>";
			echo "<tr><td>".$row['rollno']."</td>";
			echo "<td>".$row['sname']."</td>";
			echo "<td>".$row['phn']."</td>";
			echo "<td>".$row['address']."</td></tr>";
		echo "</table>";
	}
	else 
		echo "No data found";
}
}
else
{
	$sql="select * from student";
	if($result=mysqli_query($con,$sql))
	{
		echo "<table border='1'><tr><th>RollNo</th><th>Name</th><th>PhoneNo</th><th>Address</th></tr>";
	while($row=mysqli_fetch_array($result))
	{
			echo "<tr><td>".$row['rollno']."</td>";
			echo "<td>".$row['sname']."</td>";
			echo "<td>".$row['phn']."</td>";
			echo "<td>".$row['address']."</td></tr>";
	}
	echo "</table>";
	}
	else
		echo "Error".mysqli_error($con);
}
mysqli_free_result($result);
?>
</center>
</body>
</html>