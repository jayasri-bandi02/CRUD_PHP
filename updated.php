<?php 
$con=mysqli_connect("localhost","root","","nec_student_db");
	if(!$con)
	die("Couldn't connect!".mysqli_error());
$rno=$_POST['rno'];
$sql="select * from student where rollno='".$rno."'";
if($result=mysqli_query($con,$sql))
{
	if($row=mysqli_fetch_array($result))
	{
	$sname=$row['sname'];
	$phn=$row['phn'];
	$addr=$row['address'];
	}
	else
	{
		$sname=$phn=$addr='';
		echo "<center><h2>Entered roll number not found</h2></center>";
	}
}
else{
	echo "<h3>Error</h3>".mysqli_error($con);
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<form action="updated.php" method="POST">
<table>
<tr><td colspan='2'><center><b>UPDATE STUDENT DETAILS</b></center></td></tr>
<tr><td>
<label>RollNo:</label></td><td>
<input type="text" placeholder="Roll no" name="rno" readonly value="<?=$rno?>">
</td></tr>
<tr><td>
<label>Name:</label></td><td>
<input type="text" placeholder="student's name" name="sname" value="<?=$sname?>">
</td></tr>
<tr><td>
<label>Phoneno:</label></td><td>
<input type="tel" placeholder='enter 10 digit number' pattern="[0-9]{10}" name="phn"      	value="<?=$phn?>"	></td></tr>
<tr><td>
<label>Address:</label></td><td>
<input type="text" placeholder='place of residence' name="addr" 
value="<?=$addr?>"></td></tr>
<tr><td colspan='2'>
<center>
<input type="submit" name="update" class="btn" value="Update"><br><br>
<a href="http://localhost/ajwt_tutorial/update.php" >Back</a>
</td></tr>
</table>
</form>
<?php
$con=mysqli_connect("localhost","root","","nec_student_db");
	if(!$con)
	die("Couldn't connect!".mysqli_error());
if(isset($_POST['update']))
{
	$rno=$_POST['rno'];
	$sname=$_POST['sname'];
	$addr=$_POST['addr'];
	$phn=$_POST['phn'];
	$sql="update student set sname='".$sname."',address='".$addr."',phn='".$phn."' where 
	rollno='".$rno."'";
	if(mysqli_query($con,$sql))
	{
		if(mysqli_affected_rows($con)>0)
		{
			echo "Update Successful!";
		}
		else
		{
			echo "Couldn't update!";
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