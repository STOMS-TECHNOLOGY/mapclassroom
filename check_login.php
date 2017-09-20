<?php
	session_start(); //Check Login
	error_reporting(0);
	mysql_connect("localhost","sarayut_apphong","U46koCVW");
	mysql_select_db("sarayut_apphong");
	$strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['txtUsername'])."'
	and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
		
		echo "<script>alert('Username and Password Incorrect! !!'); location.href='login_page.php';</script>";

	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			

			session_write_close();

			if($objResult["Username"] == "admin")
			{
				header("location:admin_page.php");
			}
			
	}
	mysql_close();
?>
