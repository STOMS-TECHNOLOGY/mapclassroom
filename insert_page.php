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
if(isset($_POST['submit'])) {

$objConnect = mysql_connect("localhost","sarayut_apphong","U46koCVW") or die("Error Connect to Database");
$objDB = mysql_select_db("sarayut_apphong");
error_reporting(0);

  if($_POST['txtPlaceName']) {
         
         //echo $_POST['txtPlaceName'];
         $a = $_POST['txtPlaceName'];
         $sql = "SELECT * from `place` where `Building_name` = '$a'";
         $result = mysql_query($sql);
         $row = mysql_num_rows($result);
         //echo "$row" ;
         //exit();
     



     if($row){
       echo "มีชื่ออาคารแล้ว / กรุณารอสักครู่กำลังกลับสู่หน้าก่อนหน้านี้";
       //exit(5);
       //header("location:insert_page.php");
       echo "<meta http-equiv='refresh' content='3;url=insert_page.php'>";
       exit();
       }
     else {

       $allowed =  array('png' ,'jpg');
       $filename = $_FILES['fileUpload']['name'];
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
       if(!in_array($ext,$allowed) ) {
          echo "กรุณาอัพโหลดชนิดไฟล์ jpeg , png เท่านั้น / กรุณารอสักครู่กำลังกลับสู่หน้าก่อนหน้านี้";
          echo "<meta http-equiv='refresh' content='3;url=insert_page.php'>";
          exit();
       }

       if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"image/Psu_".$_FILES["fileUpload"]["name"]))
        { 
         //*** Insert Topic ***//
        $content  = $_POST["txtPlaceDetail"];
        $strSQL   = "INSERT INTO place ";
        $strSQL   .="(Building_name,Latitude,Longitude,Building_image) ";
        $strSQL   .="VALUES";
        $strSQL   .="('".$_POST["txtPlaceName"]."','".$_POST["txtPlacelat"]."','".$_POST["txtplacelong"]."','".$_FILES["fileUpload"]["name"]."') ";
        $objQuery = mysql_query($strSQL);

        header("location:edit_page.php");

        }
      }
    }



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
  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>



  <meta name="viewport" content="width=device-width, initial-scale=1">

   

</head>

<body>
  <header role="banner">
  <h1>เพิ่มสถานที่</h1>
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

</nav>

<main role="main">
  <section class="panel important">
    <h2>เพิ่มสถานที่</h2>

  <form name="your_form" id="your_form" method="post" enctype="multipart/form-data">
      <div class="twothirds">



      ชื่อสถานที่ :      <input type="text" id="placename" name="txtPlaceName"><span id="user-availability-status"></span><br><br>
      ละติจูด :  <input type="text" name="txtPlacelat"><br><br>
      ลองติจูด : <input type="text" name="txtplacelong"><br><br>
อัพโหลดรูป: <input id="my_file_field" type="file" name="fileUpload"><br><br>
      
                      <input name="submit" type="submit" value="บันทึกข้อมูล" />




  </form>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>



    
       

      </div>

    
          

        
    
  </section>


 


</main>
  
  
</body>
</html>
