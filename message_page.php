<?php
  session_start();
  error_reporting(0);
  if($_SESSION['UserID'] == "")
  {
    echo "<script>alert('Please Login !!'); location.href='login_page.php';</script>";
    exit();
  }
?>
<!DOCTYPE html>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style_admin.css">

  
</head>

<body>
  <header role="banner">
  <h1>Message Page</h1>
  <ul class="utilities">
    
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="users"><a href="admin_page.php">Main</a></li>
    <li class="write"><a href="insert_page.php">Insert</a></li>
    <li class="edit"><a href="edit_page.php">Edit Website</a></li>
    <li class="comments"><a href="message_page.php">Suggestion</a></li>
    <li class="view"><a href="index.php">View Website</a></li>

    
  </ul>
</nav>
<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
$strSQL = "SELECT * FROM message";
mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 7;   // Per Page

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

$strSQL .=" order  by MessageID DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>



<main role="main">
  <section class="panel important">
    <h2>Show Suggestion</h2>
    <form>
     

      <table  border="1"  cellspacing="0" cellpadding="1" bgcolor="white">
  <tr bgcolor="#2a3542">
    
    <th width="200"> <div align="center"><font color="#ddd">Suggestion</font></div></th>
    <th width="100"> <div align="center"><font color="#ddd">CreateDate</font></div></th>
    <th width="5"> <div align="center"><font color="#ddd"><br><i class="fa fa-cog" aria-hidden="true"></i></div></th>
    
  </tr>

  <?php

while($objResult = mysql_fetch_array($objQuery))
{
?>


  <tr bgcolor=white>
    

    
    <td><a href="viewmsg_page.php?MessageID=<?php echo $objResult["MessageID"];?>"> <?php echo $objResult["Topic"];?></a></td>
    <td><div align="center"><?php echo $objResult["CreateDate"];?></div></td>
    <td><center><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delete_msg.php?MessageID=<?php echo $objResult["MessageID"];?>';}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
    </td>
    
  </tr>

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
    
          

        
      
    </form>
  </section>
</main>
  
  
</body>
</html>
