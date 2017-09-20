
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

  <meta name="viewport" content="width=device-width, initial-scale=1">

  
</head>




<body>
  <header role="banner">
  <h1>Hi Admin</h1>
  <ul class="utilities">
    
    <li class="logout warn"><a href="logout.php">Log Out</a></li>
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
  <section class="panel important">
    <h2>Dashboard</h2>
     <form action="#" method="post">
      

    
          

        
      
    </form>
  </section>
</main>



  
  
</body>
</html>
