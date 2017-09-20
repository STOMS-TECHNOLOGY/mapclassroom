<?php
  session_start();
  error_reporting(0);
  if($_SESSION['UserID'] == "")
  {
    echo "<script>alert('Please Login !!'); location.href='login_page.php';</script>";
    exit();
  }
?>
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php

		//*** Update Record ***//
		$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
		$objDB = mysql_select_db("sarayut_apphong");
		$content  = $_POST["txtPlaceDetail"];
		

		
		$strSQL = "UPDATE place SET ";
		$strSQL .="Building_name 		= '"	.$_POST["txtPlaceName"].		"' ";
		$strSQL .=",Latitude 			= '"	.$_POST["txtPlacelat"].			"' ";
		$strSQL .=",Longitude 			= '"	.$_POST["txtPlacelong"].		"' ";
		$strSQL .="WHERE Building_id 	= '"	.$_GET["Building_id"].			"' ";
		
		$objQuery = mysql_query($strSQL);


		
	echo "<script>alert('Update Complete'); location.href='edit_page.php';</script>";
?>
</body>
</html>