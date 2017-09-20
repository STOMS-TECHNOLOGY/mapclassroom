<html>
<?php
  session_start();
  error_reporting(0);
  if($_SESSION['UserID'] == "")
  {
    echo "<script>alert('Please Login !!'); location.href='login_page.php';</script>";
    exit();
  }
?>
<?php
	 $objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
	$strSQL = "SELECT * FROM place WHERE Building_id = '".$_GET["Building_id"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>

<title>Edit Message</title>

<head>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body bgcolor="#2a3542">
  	<div style=" margin:5% 5% 5% 5%; padding:10px 10px 40px 10px; background-color: white;">

		<form name="form1" method="post" action="update_msg.php?Building_id=<?php echo $_GET["Building_id"];?>" enctype="multipart/form-data">
			<center><h2><br>Edit Place</h2>

				<div>
				<b>Place Name</b> :<br> 
					<input type="text" name="txtPlaceName" value="<?php echo $objResult["Building_name"];?>"><br><br>
				</div>


				<div>
				<b>Latitude </b> :<br>
					<input type="text" name="txtPlacelat" value="<?php echo $objResult["Latitude"]; ?>"><br><br>
				<b>Longitude</b> :<br>
					<input type="text" name="txtPlacelong" value="<?php echo $objResult["Longitude"]; ?>"><br><br>
					<input name="btnSubmit" type="submit" value="Submit">
				</div>

			</center>
		</form>
	</div>
</body>
</html>