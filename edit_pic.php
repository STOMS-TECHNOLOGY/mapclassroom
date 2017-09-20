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
<?php
 $objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
  $strSQL = "SELECT * FROM place WHERE Building_id = '".$_GET["Building_id"]."' ";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  $objResult = mysql_fetch_array($objQuery);
?>
<title>Edit Picture</title>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body bgcolor="#2a3542">
  <div style=" margin:5% 5% 5% 5%; padding:10px 10px 40px 10px; background-color: white;">
    <form name="form1" method="post" action="update_pic.php?Building_id=<?php echo $_GET["Building_id"];?>" enctype="multipart/form-data">
      <center><br>
        <h2>Edit Picture</h2><br>
          <img src="image\Psu_<?php echo $objResult["Building_image"];?>" width="40%" height="30%" border="1"><br><br>
        <b>Picture</b> : 
          <input type="file" name="fileUpload"><br><br>
          <input type="hidden" name="hdnOldFile" value="<?php echo $objResult["Building_image"];?>">
          <input type="submit" name="btnsubmit" value="upload">
      </center>
    </form>
  </div>

</body>
</html>
