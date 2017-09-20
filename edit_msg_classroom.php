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
	$strSQL = "SELECT * FROM Classroom WHERE Classroom_id = '".$_GET["Classroom_id"]."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
?>

<title>Edit Picture</title>

<head>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body bgcolor="#2a3542">
  	<div style=" margin:5% 5% 5% 5%; padding:10px 10px 40px 10px; background-color: white;">

		<form name="form1" method="post" action="update_msg_classroom.php?Classroom_id=<?php echo $_GET["Classroom_id"];?>" enctype="multipart/form-data">
			<center><h2><br>Edit Classroom</h2>

				<div>
				<b>Class Number</b> : <br> 
					<input type="text" name="txtNumber" value="<?php echo $objResult["Classroom_number"];?>"><br><br>
				</div>


				<div>
				<b>Floors</b> :<br>
					<input type="url	" name="txtFloors" value="<?php echo $objResult["Floors"]; ?>"><br><br>

				<b>Latitude :</b><br>
					<input type="txt" name="txtla" value="<?php  echo $objResult["Latitude"]; ?>"><br><br>

				<b>Longitude</b><br>
					<input type="text" name="txtlong" value=" <?php echo $objResult["Longitude"]; ?>"><br><br>

				<b>Please Select Building ID :</b> <br>
				<center><select name="txtBuilding">
      			<option value="<?=$objResult["Building_id"];?>">Building_id = <?php echo $objResult["Building_id"];?></option>
      
			      <?php
			      $objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
			      $objDB = mysql_select_db("sarayut_apphong");
			      $strSQL = "SELECT * FROM place ORDER BY Building_id";
			      $objQuery = mysql_query($strSQL);
			      while($objResult = mysql_fetch_array($objQuery))
			      {
			      ?>
			      <option value="<?=$objResult["Building_id"];?>"><?=$objResult["Building_id"]." - ".$objResult["Building_name"];?></option>
			      <?
			      }
			      ?>
			      </select></center>


					<br><input name="btnSubmit" type="submit" value="Submit">
				</div>

			</center>
		</form>
	</div>
</body>
</html>