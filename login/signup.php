
<?php

$con=mysqli_connect("localhost","root","","reg") ;

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
// echo "Connected successfully </br>";


mysqli_select_db($con,"reg") or die (mysqli_error($con));

if(isset($_POST['signup']))
{
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $cpass=$_POST['conpassword'];
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
	 else if($password!=$cpass)
	 {
	 	echo "<script>alert('passwords do not match')</script>";
	 	exit();
	 }
	 else
	 {

	 $query="INSERT INTO user (name,password,email) VALUES ('$username', '$password', '$email')";


	if ($con->query($query) === TRUE) 
	{
    echo "<script>alert('New record created successfully')</script>";
   } 
else {
    echo "Error: " . $query . "<br>" . $con->error;
}
}

} 

?>