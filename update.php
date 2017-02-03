<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>

<body>
<?php
	$con=mysqli_connect("localhost","root","","sdb");
	
	$id=$_GET['id'];
	$sel="select * from register_tbl where id='$id'";
	$select=mysqli_query($con,$sel);
	
	while($list=mysqli_fetch_array($select))
	{
		$username=$list['name'];
		$uphone=$list['phone'];
		$uemail=$list['email'];
		$ugender=$list['gender'];
		$uhobby=$list['hobbies'];
		$upic=$list['pic'];
		$ucountry=$list['country'];
	}
?>
<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
    <th align="center">
   		<h1>Update Employee</h1>
    </th>
</tr>
<tr>
<td>Name:</td><td><input type="text" name="name"  value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td>Phone:</td><td><input type="text" name="phone"  value="<?php echo $uphone;?>"/></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" name="email"  value="<?php echo $uemail;?>" /></td>
</tr>
<tr>
<td>Gender</td><td><input type="radio" name="gender" value="male" />male
<input type="radio" name="gender" value="female" />female</td>
</tr>
<tr>
<td>Hobbies:</td><td><input type="checkbox" name="hobby[]" value="music" />Listening to music</td>
</tr>
<tr>
<td></td><td><input type="checkbox" name="hobby[]" value="reading" />Reading</td>
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
	
	$query="update register_tbl set name='$name',phone='$phone',email='$email',gender='$gender',hobbies='$hobby',pic='$photo',country='$country' where id='$id'";
	$insert=mysqli_query($con,$query);
	
	if($insert>0)
	{
		header('location:index.php');
	}
	else
	{
		echo"error";
	}
}
?>

</body>
</html>