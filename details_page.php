
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>index</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="image/favicon.ico">




    
  </head>


  <body>


 <nav class="navbar navbar-default">
  <div class="container-fluid">


      <form class="navbar-form navbar-left" action="search.php">
      
          <div class="form-group">
        
          <input type="text" name ="txtSearch" class="form-control" placeholder="Search">

        </div>
        
      </form>

      <ul class="nav navbar-nav navbar-right">
      	
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbspHome</a></li>
        
      </ul>

  </div>
</nav>

<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
$strSQL = "SELECT * FROM place WHERE Building_id = '".$_GET["Building_id"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objQuery  = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>


<center><h2><b></b><?php echo $objResult["Building_name"]; ?> </h2>
<div style="margin-top: 3%;">
  <img class="img-thumbnail" alt="Cinque Terre" src="image\Psu_<?php echo $objResult["Building_image"];?>" width="300" high="240" >
</div></center> <!--image center-->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


 </body>


 
<body>




   

<div style="margin-left: 5%; margin-top: 5%">







<div style=" margin-bottom: 3%; margin-top: 1% ">
<a class="btn btn-success" target="_blank" href="https://www.google.co.th/maps/search/<?php echo $objResult["Latitude"]; ?>,<?php echo $objResult["Longitude"]; ?>">
<span class="glyphicon glyphicon-map-marker" aria-hidden="true"> Location</span></a>
</div> 








<?php
      $objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
      $objDB = mysql_select_db("sarayut_apphong");
      $strSQL = "SELECT * FROM Classroom WHERE Building_id = '".$_GET["Building_id"]."' ";
      $objQuery = mysql_query($strSQL);
      
      
     
?>
<div style="margin-bottom: 10%">
<h3><b>ห้องเรียนภายในอาคาร </b></h3> <br>

<?php
  while($objResult = mysql_fetch_array($objQuery))
  {
?>


<span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp&nbsp <a href="details_page_classroom.php?Classroom_id=<?php echo $objResult["Classroom_id"];?>"><?php echo $objResult["Classroom_number"] ?></a> <br><br>


<?php
  }
?>
</div>


    
    





</div>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="js/index2.js"></script>













 </body>
 
 	



</html>