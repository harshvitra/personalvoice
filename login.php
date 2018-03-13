<?php  
 $connect = mysqli_connect("localhost", "root", "", "image");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO users(userImage) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>  
<?php
    require_once "config.php";

    if (isset($_SESSION['access_token'])) {
        header('Location: index.php');
        exit();
    }

    $loginURL = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login or Register</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <style>
.mystyle{height:50px;
    margin: 0;
    padding: 0 20px 0px 20px;
    vertical-align: middle;
    background: #fff;
    border: 3px solid #fff;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 50px;
    color: #888;
    width:100%;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;}
</style>

<script type="text/javascript">
    function validate()
    {
        
        if(document.RegistrationForm.gender.value == "-1")
        {
            alert("Please provide your Gender !");
            document.RegistrationForm.gender.focus();
            return false;
        }
        if(document.RegistrationForm.role.value == "-1")
        {
            alert("Please provide your Role !");
            document.RegistrationForm.role.focus();
            return false;
        }
        if(document.RegistrationForm.Password.value != document.RegistrationForm.confirmPassword.value)
        {
            alert("Password Does not match");
            document.RegistrationForm.confirmPassword.focus();
            return false;
            } 
    }
</script>  

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Login or Register</strong> </h1>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="checklogin.php" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="text" name="Email" placeholder="Email" class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="Password" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" class="btn">Sign in!</button>

                                <div class="social-login">

          	                        	<div class="social-login-buttons" onclick="window.location = '<?php echo $loginURL ?>';">


          		                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
          		                        		<i class="fa fa-google-plus"></i> Google Plus
          		                        	</a>
          	                        	</div>
          	                        </div>
				                    </form>
			                    </div>
		                    </div>



                        </div>

                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">

                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form  class="registration-form" role="form" name="RegistrationForm" onSubmit="return validate();" method="post" action="checkregister.php">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-user-name">User name</label>
				                        	<input type="text" name="form-user-name" placeholder="User name..." class="form-first-name form-control" id="form-first-name">
				                        </div>
				                    
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
				                        </div>
                                <div class="form-group">
                  <input type="tel" class="mystyle" id="phone" placeholder="Phone Number" name="Phonenumber" required>
                </div>
               
                <div class="form-group">
                  <input type="password" class="mystyle" id="RPassword" name="Password" placeholder="Password" required maxlength="16"></div>
                  <div class="form-group">
                    <input type="password" class="mystyle" name="confirmPassword" placeholder="ConfirmPassword" required maxlength="16">
                </div>
                                <div class="form-group">
				                        	<label class="sr-only" for="form-age">Age</label>
				                        	<input type="text" name="form-age" placeholder="Age" class="form-email form-control" id="form-age">
				                        </div>
                                          <div class="form-group">
                    <select class="mystyle" id="gender" name="Gender" required>
                    <option value="-1">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select>
                </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="image">Profile picture</label>
                                            <input type="file" name="image" placeholder="Profile Picture" class="form-email form-control" id="image">
                                        </div>
                              

				                        <input type="submit" class="btn" name="insert" id="insert" value="Sign me up!">
				                    </form>
			                    </div>
                        	</div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">

        			<div class="col-sm-8 col-sm-offset-2">

        				<p></p>
        			</div>

        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  