<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
error_reporting(0);

$sql = "SELECT * from `place` where `Building_name` = '".$_REQUEST['buildername']."'" ;
$result = mysql_query($sql);
$row = mysql_num_rows($result);

//$sql = 

//$sql = "UPDATE `players`SET `xp`= `xp`+ 1 WHERE `name` = '".$_REQUEST['name']."'";
   
   if($row){
     echo "Builder name is already.";
   }

  ?>