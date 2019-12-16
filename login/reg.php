
<?php 

$username=$_POST['username'];
$password=$_POST['password'];

$con=mysqli_connect("localhost","root","");
$username=stripcslashes($username);
$password=stripcslashes($password);
$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);


mysqli_select_db($con,"reg");

$result=mysqli_query($con,"select * from user where name= '$username' and password='$password'")
                    or die("Failed to query database".mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row['name'] == $username  && $row['password'] == $password)
{
	//echo "Login success  ".$row['name'];
	echo "<script>var x=' $row[name]';window.location='./navbar.html';alert('Login Sucess'+x);</script>";
}
else
{
	echo "failed to login";
}

 ?>