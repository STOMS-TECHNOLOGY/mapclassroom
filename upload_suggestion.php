<html>
<head>
<title>Upload Page</title>
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
error_reporting(0);
session_start();

	
	//*** Insert Topic ***//
	$content	= $_POST["txtPlaceDetail"];
	$strSQL 	= "INSERT INTO message ";
	$strSQL 	.="(Topic,MsgDetail,Name,CreateDate) ";
	$strSQL 	.="VALUES";
	$strSQL 	.="('".$_POST["txtTopic"]."','".$_POST["txtDetail"]."','".$_POST["txtName"]."','".date("Y-m-d H:i:s")."') ";
	$objQuery = mysql_query($strSQL);

			header("location:index.php");


?>

</body>
</html>

