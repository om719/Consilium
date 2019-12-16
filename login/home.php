<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

	<form action="home.php" method="post" >
		<input type="text" name="username" placeholder="Username">
		<br>
		<input type="password" name="password" placeholder="Password">
		<br>
		<input type="text" name="email" placeholder="Email">
		<br>
		<input type="submit" name="signup" value="signup">
		
	</form>

</body>
</html>







<?php

$con=mysqli_connect("localhost","root","","reg") ;

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
echo "Connected successfully </br>";


mysqli_select_db($con,"reg") or die (mysqli_error($con));

if(isset($_POST['signup']))
{
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $email=$_POST['email'];

	 if($username=='')
	 {
	 	echo "<script>alert('Please enter the name')</script>";
	 	exit();
	 }

	 else if($password=='')
	 {
	 	echo "<script>alert('Please enter the password')</script>";
	 	exit();
	 }

	 else if($email=='')
	 {
	 	echo "<script>alert('Please enter the email')</script>";
	 	exit();
	 }

	 else
	 {

	 $query="INSERT INTO user (name,password,email) VALUES ('$username', '$password', '$email')";


	if ($con->query($query) === TRUE) 
	{
    echo "New record created successfully";
   } 
else {
    echo "Error: " . $query . "<br>" . $con->error;
}
}

} 

?>