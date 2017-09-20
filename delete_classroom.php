<html>
<head>
<title>Delete Page</title>
</head>
<body>
<?php
error_reporting(0);
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
$strSQL = "DELETE FROM Classroom ";
$strSQL .="WHERE Classroom_id = '".$_GET["Classroom_id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	echo "<script>alert('Delete Complete'); location.href='edit_page_classroom.php';</script>";
}
else
{
	echo "<script>alert('Delete Error'); location.href='edit_page_classroom.php';</script>";
}
mysql_close($objConnect);
?>
</body>
</html>