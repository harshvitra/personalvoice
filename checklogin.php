
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
	
$database="baby"; 

$_SESSION["Email"] =$_POST['Email'];
$_SESSION["pass"] =$_POST['Password'];
$con = mysqli_connect("localhost","root" ,"","baby");
if (!$con)
{
die('Could not connect: ' . mysqli_error());
}
mysqli_select_db("$database", $con);
$table = 'users';

$sql = "SELECT * FROM $table WHERE Email = '" .$_SESSION["Email"]. "'";
$results = mysqli_query($con,$sql);
$results = mysqli_fetch_assoc( $results );

//Getting all information in sessions 

$_SESSION["Fullname"]=$results['userName'];
$_SESSION["Email"]=$results['email'];


if ($results['userID']==NULL) {
		echo "<script type='text/javascript'>\n";
		echo "alert('This Email does not exist');\n";
		echo "</script>";
		echo '<script>window.location="login.php"</script>';
		}

$storedpass = $results['password'];

if($_SESSION["pass"] == $storedpass){
					
					$_SESSION["loggedin"] =1;
					echo "<script type='text/javascript'>\n";
					echo "alert('Successfyl Login !');\n";
					echo "</script>";
					echo '<script>window.location="index.php"</script>';
 }else{
		echo "<script type='text/javascript'>\n";
		echo "alert('The Email or Password is Incorrect');\n";
		echo "</script>";
		echo '<script>window.location="login.php"</script>';
	} ?>