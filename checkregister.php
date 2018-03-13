<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$database="baby"; 

$fullname =$_POST['form-user-name'];
$password =$_POST['Password'];
$email =$_POST['form-email'];
$gender =$_POST['Gender'];
$age =$_POST['form-age'];
$phone =$_POST['Phonenumber'];

 $con = mysqli_connect("localhost", "root", "", "baby");  

if (!$con)
{
die('Could not connect: ' . mysqli_error());
}
mysqli_select_db("$database", $con);
$table = 'users';

$sql1 = "SELECT * FROM $table";
$results = mysqli_query($con,$sql1);
$results = mysqli_fetch_assoc( $results );

if($email!=$results['Email']){

$sql = "insert into $table (userName, password, email, gender , age, phone) values ('$fullname', '$password','$email','$gender','$age','$phone')";
mysqli_query($con,$sql);
echo "<script type='text/javascript'>\n";
		echo "alert('Successful Registration');\n";
		echo "</script>";
echo '<script>window.location="index.php"</script>';
}
else{
	echo "<script type='text/javascript'>\n";
		echo "alert('This Email already exists !');\n";
		echo "</script>";
		echo '<script>window.location="index.php"</script>';
	}
?>