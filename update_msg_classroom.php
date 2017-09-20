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
		
		

		
		$strSQL = "UPDATE Classroom SET ";
		$strSQL .="Classroom_number 	= '"	.$_POST["txtNumber"].					"' ";
		$strSQL .=",Floors 				= '"	.$_POST["txtFloors"].					"' ";
		$strSQL .=",Building_id 		= '"	.$_POST["txtBuilding"].					"' ";
		$strSQL .=",Latitude	 		= '"	.$_POST["txtla"].					"' ";
		$strSQL .=",Longitude	 		= '"	.$_POST["txtlong"].					"' ";
		$strSQL .="WHERE Classroom_id 	= '"	.$_GET["Classroom_id"].					"' ";
		
		$objQuery = mysql_query($strSQL);


		
	echo "<script>alert('Update Complete'); location.href='edit_page_classroom.php';</script>";
?>
</body>
</html>