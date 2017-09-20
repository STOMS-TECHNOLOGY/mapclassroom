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

  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  
</head>

<body>
  <header role="banner">
  <h1>Insert Page</h1>
  <ul class="utilities">

    
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
<ul class="main">
    <li class="users"><a href="admin_page.php">หน้าหลัก</a></li>
    <li class="write"><a href="insert_page.php">เพิ่มอาคาร</a></li>
    <li class="edit"><a href="edit_page.php">แก้ไขอาคาร</a></li>
    <li class="write"><a href="insert_page_classroom.php">เพิ่มห้องเรียน</a></li>
    <li class="edit"><a href="edit_page_classroom.php">แก้ไขห้องเรียน</a></li>
    <li class="view"><a href="index.php">ดูเว็บไซต์จริง</a></li>
</ul>

</nav>

<main role="main">
  <section class="panel important">
    <h2>Write a post</h2>

  <form name="form1" method="post" action="upload_classroom.php" enctype="multipart/form-data">
      <div class="twothirds">



      Classroom Number :    <input type="text" name="txtNumber"><br><br>
      Floors           :   
<select name="txtFloors">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>

<br><br>
      Latitude         :    <input type="text" name="txtla"><br><br>
      Longitude        :    <input type="text" name="txtlong"><br><br>
      
      Building :<br>
      <select name="txtBuilding">
      <option value=""> Please Select Building </option>
      
      <?php
      $objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
      $objDB = mysql_select_db("sarayut_apphong");
      $strSQL = "SELECT * FROM place ORDER BY Building_id";
      $objQuery = mysql_query($strSQL);
      while($objResuut = mysql_fetch_array($objQuery))
      {
      ?>
      <option value="<?=$objResuut["Building_id"];?>"><?=$objResuut["Building_id"]." - ".$objResuut["Building_name"];?></option>

      

      <?
      }
      ?>
      </select>
      


      <input name="btnSubmit" type="submit" value="Submit">




  </form>




    
       

      </div>

    
          

        
    
  </section>


 


</main>
  
  
</body>
</html>
