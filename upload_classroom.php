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
	
	$strSQL 	= "INSERT INTO Classroom ";
	$strSQL 	.="(Classroom_number,Floors,Latitude,Longitude,Building_id) ";
	$strSQL 	.="VALUES";
	$strSQL 	.="('".$_POST["txtNumber"]."','".$_POST["txtFloors"]."','".$_POST["txtla"]."','".$_POST["txtlong"]."','".$_POST["txtBuilding"]."') ";
	$objQuery = mysql_query($strSQL);

			header("location:edit_page_classroom.php");


?>

</body>
</html>

