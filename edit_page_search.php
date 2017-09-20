<?php 


$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB 		= mysql_select_db("sarayut_apphong");

$strSQL 	= "SELECT * FROM place WHERE Building_name LIKE '%".$_REQUEST["txtSearch"]."%' ";
$objQuery 	= mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_row 	= mysql_num_rows($objQuery);

if($num_row == 0){
echo "<script>alert('Not Found !!'); location.href='edit_page.php';</script>";
    exit();
} 

?>




<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style_admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>

<body>
  <header role="banner">
  <h1>Edit Building</h1>
  <ul class="utilities">
    
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
    <form class="navbar-form navbar-left" action="edit_page_search.php">
      <input type="text" name ="txtSearch" class="form-control" placeholder="Search" size="5">
    </form>
    
  </ul>
</header>

<nav role='navigation'>
    <ul class="main">
    <li class="users"><a href="admin_page.php">Main</a></li>
    <li class="write"><a href="insert_page.php">Insert Building</a></li>
    <li class="edit"><a href="edit_page.php">Edit Building</a></li>
    <li class="write"><a href="insert_page_classroom.php">Insert Classroom</a></li>
    <li class="edit"><a href="edit_page_classroom.php">Edit Classroom</a></li>
    <li class="view"><a href="index.php">View Website</a></li>
    

    
  </ul>
</nav>

<main role="main">
  
    
<?php

$Per_Page = 6;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
  $Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
  $Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
  $Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
  $Num_Pages =($Num_Rows/$Per_Page)+1;
  $Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by Building_id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);


?>
<table width="200" height="100" border="1" bgcolor="white">
<tr border="1" bgcolor="#2a3542">

<th width="50"> <div align="center"><font color="#ddd"><br>Place Name</div></th>
<th width="50"> <div align="center"><font color="#ddd"><br>Picture</div></th>

<th width="50"> <div align="center"><font color="#ddd"><br><i class="fa fa-cog" aria-hidden="true"></i></div></th>

</tr>
<?php
  while($objResult = mysql_fetch_array($objQuery))
  {
?>
<tr>

<td><div align="center"><?php echo $objResult["Building_name"];?></div></td>
<td><center><img src="image\Psu_<?php echo $objResult["Building_image"];?>" width="100" height="70" border="1"></center></td>

<td><center>

<a href="edit_pic.php?Building_id=<?php echo $objResult["Building_id"];?>"><i class="fa fa-picture-o" aria-hidden="true"></i></a><br>
<a href="edit_msg.php?Building_id=<?php echo $objResult["Building_id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a><br>
<a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delete_place.php?Building_id=<?php echo $objResult["Building_id"];?>';}"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br></center>
</td>
</tr></center>
<?php
  }
?>
</table>

<center><h6>
<?php
if($Prev_Page)
{
  echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
  if($i != $Page)
  {
    echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
  }
  else
  {
    echo "<b> $i </b>";
  }
}
if($Page!=$Num_Pages)
{
  echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
mysql_close($objConnect);
?><br>
Total <font ><?php echo $Num_Rows;?></font> Message
</h6></center>

<?php
mysql_close($objConnect);
?>


 


</main>
  
  
</body>
</html>