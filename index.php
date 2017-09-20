
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="image/favicon.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>index</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 0px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
    padding-bottom: 1%;
    padding-left: 1%;
    padding-top: 1%;
    padding-right: 1%;
    border: 1px;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}

    </style>

    
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
      	
        
        
      </ul>

  </div>
</nav>

<center><img src="image/logo.png" width="115" height="150"></center> <!--logo brand -->
<!--   <center><img src="image/logo5.png" width="115" height="170"></center>   -->






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


 </body>


 
<body>

<?php
$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
$strSQL = "SELECT * FROM place";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 9;   // Per Page

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


<div class="container" style="margin-top: 5%">
   
<?php
  while($objResult = mysql_fetch_array($objQuery))
  {
?>
    <div id="products" class="row list-group" ">
        <div class="item  col-xs-4 col-lg-4 grid-group-item list-group-item">
            <div class="thumbnail">
                <img class="group list-group-image" src="image\Psu_<?php echo $objResult["Building_image"];?>" width="120" high="80">
                <div class="caption">
                    <h4 class="group inner list-group-item-heading" style="margin-bottom: 2%">
                        <?php echo $objResult["Building_name"]; ?></h4>
                    <div class="row" style="margin-left: 1%">
                        <div style="margin-left: 1%; margin-bottom: 1%; ">
                             <a class="btn btn-success"  href="details_page.php?Building_id=<?php echo $objResult["Building_id"];?>">Details</a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <?php
 }
?>

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
    echo "<b>Page : $i </b>";
  }
}
if($Page!=$Num_Pages)
{
  echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next >></a> ";
}
mysql_close($objConnect);
?><br><br>
<b>Total : </b> <font><?php echo $Num_Rows;?></font> Place
</h6></center><br><br><br>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="js/index2.js"></script>













 </body>
 
 	



</html>