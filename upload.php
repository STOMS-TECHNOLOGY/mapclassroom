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

if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"image/Psu_".$_FILES["fileUpload"]["name"]))
		{
	

	//*** Insert Topic ***//
	$content	= $_POST["txtPlaceDetail"];
	$strSQL 	= "INSERT INTO place ";
	$strSQL 	.="(Building_name,Latitude,Longitude,Building_image) ";
	$strSQL 	.="VALUES";
	$strSQL 	.="('".$_POST["txtPlaceName"]."','".$_POST["txtPlacelat"]."','".$_POST["txtplacelong"]."','".$_FILES["fileUpload"]["name"]."') ";
	$objQuery = mysql_query($strSQL);

			header("location:edit_page.php");

}
?>

</body>
</html>

