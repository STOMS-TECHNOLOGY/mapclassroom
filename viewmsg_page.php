
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
  <meta charset="UTF-8">
  <title>Admin Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style_admin.css">

  
</head>




<body>
  <header role="banner">
  <h1>Suggestion</h1>
  <ul class="utilities">
    <li class="users"><a href="#">My Account</a></li>
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



<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
$strSQL = "SELECT * FROM message WHERE MessageID = '".$_GET["MessageID"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

  while($objResult = mysql_fetch_array($objQuery))
  {
?>
    
  </ul>
</nav>
<main role="main">
  <section class="panel important">
  <div style="margin: 5% 5% 5% 5%">
    <center><h2><b>Topic : </b><?php echo $objResult["Topic"];?></h2></center>

    <table border="0">
      

      <tr>
        <td><b>Detail</b></td>
        <td ><?php echo $objResult["MsgDetail"]; ?></td>
        
      </tr><br>
      <tr>
        <td><b>Name</b></td>
        <td ><?php echo $objResult["Name"]; ?></td>
        
      </tr><br>
      <tr>
        <td><b>Credate Date</b></td>
        <td ><?php echo $objResult["CreateDate"]; ?></td>
        
      </tr>
    </table>

     
  

<?php
  }
?>

<?php
mysql_close($objConnect);
?>

  <button onclick="window.location='message_page.php'"><i class="fa fa-arrow-left" aria-hidden="true">&nbsp Back</i></button>

 </div>     

    
          

        
      
 
  </section>
</main>



  
  
</body>
</html>
