<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
    <th align="center">
   		<h1>Add Employee</h1>
    </th>
</tr>
<tr>
<td>Name:</td><td><input type="text" name="name" /></td>
</tr>
<tr>
<td>Phone:</td><td><input type="text" name="phone" /></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="email" /></td>
</tr>
<tr>
<td>Gender</td><td><input type="radio" name="gender" value="male" />male
<input type="radio" name="gender" value="female" />female</td>
</tr>
<tr>
<td>Hobbies:</td><td><input type="checkbox" name="hobby[]" value="Music" />Listening to music</td>
</tr>
<tr>
<td></td><td><input type="checkbox" name="hobby[]" value="Reading" />Reading</td>
</tr>
<tr>
<td></td><td> <input type="checkbox" name="hobby[]" value="Browsing" />Browsing</td>
</tr>
<tr>
<td></td><td><input type="checkbox" name="hobby[]" value="Playing" />Playing</td>
</tr>
<tr>
<td>Profile Pic:</td><td><input type="file" name="photo" /><br /></td>
</tr>
<tr>
<td>Country:</td><td><select name="country">
			<option>India</option>
            <option>Other</option>
         </select>
</td>
</tr>
<tr>
<td></td><td><input type="submit" name="submitbtn" value="save" /></td>
</tr>
<tr>
<td></td>
</tr>
</table>
</form>



<?php
$con=mysqli_connect("localhost","root","","sdb");
$sel="select * from register_tbl";
$select=mysqli_query($con,$sel);

if(isset($_POST['submitbtn']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$hobby=implode(",",$_POST['hobby']);
	$pic=$_FILES['photo']['tmp_name'];
	$photo="uploads/".$_FILES['photo']['name'];
	move_uploaded_file($pic,$photo);
	$country=$_POST['country'];
	
	$query="insert into register_tbl(name,phone,email,gender,hobbies,pic,country) values('$name','$phone','$email','$gender','$hobby','$photo','$country')";
	$insert=mysqli_query($con,$query);
	
	if($insert>0)
	{
		echo"success";
	}
	else
	{
		echo"error";
	}
}
?>
<br /><br /><br />
<form action="" method="post" enctype="multipart/form-data">
<table border="1" bgcolor="#CCCCCC">
<tr>
<th>Name</th>
<th>Photo</th>
<th>Phone</th>
<th>Email</th>
<th>Gender</th>
<th>Hobbies</th>
<th>Country</th>
</tr>

<?php

	$sel="select * from register_tbl";
	$select=mysqli_query($con,$sel);
	
	while($list=mysqli_fetch_array($select))
	{
		$uid=$list['id'];
		$username=$list['name'];
		$uphone=$list['phone'];
		$uemail=$list['email'];
		$ugender=$list['gender'];
		$uhobby=$list['hobbies'];
		$upic=$list['pic'];
		$ucountry=$list['country'];
		
		echo"<tr>";
		echo"<td>";
		echo $username;
		echo"</td>";
		echo"<td>";
		echo "<img src='$upic' width='40' height='40'>";
		echo"</td>";
		echo"<td>";
		echo $uphone;
		echo"</td>";
		echo"<td>";
		echo $uemail;
		echo"</td>";
		echo"<td>";
		echo $ugender;
		echo"</td>";
		echo"<td>";
		echo $uhobby;
		echo"</td>";
		echo"<td>";
		echo $ucountry;
		echo"</td>";
		echo"<td>";
		echo"<input type='submit' name='deletebtn' value='delete' />";
		echo"<input type='hidden' name='hdid' value='$uid' />";
		echo"</td>";
		echo"<td>";
		echo"<input type='submit' name='updatebtn' value='update' />";
		echo"</td>";
		
		echo"</tr>";
		
	}
if(isset($_POST['deletebtn']))
{
	$id=$_POST['hdid'];
	$qry="delete from register_tbl where id='$id'";
}
if(isset($_POST['updatebtn']))
{
	$id=$_POST['hdid'];
	header('location:update.php/?id='.$id);
}

?>
</table>
</form>
</body>
</html>