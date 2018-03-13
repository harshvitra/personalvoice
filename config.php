<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("270614321183-jftp39rsilf0bt7o48ngtsnss9t30v06.apps.googleusercontent.com");
	$gClient->setClientSecret("RiWR35hWEBcFgooWdDLjOoRL");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/bot/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
