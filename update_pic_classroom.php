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
	
	if($_FILES["fileUpload"]["name"] != "")
	{
		

		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"image/Psu_".$_FILES["fileUpload"]["name"]))
		{

			//*** Delete Old File ***//			
			@unlink("image/Psu_".$_POST["hdnOldFile"]);
			
			//*** Update New File ***//
		$strSQL = "UPDATE Classroom SET ";
		$strSQL .="Classroom_image 			= '"	.$_FILES["fileUpload"]["name"].			"' ";
		$strSQL .="WHERE Classroom_id 		= '"	.$_GET["Classroom_id"].						"' ";
		
		$objQuery = mysql_query($strSQL);		

			

		};
	};
	echo "<script>alert('Update Complete'); location.href='edit_page_classroom.php';</script>";
	
?>
	
</body>
</html>