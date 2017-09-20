<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Contact Us</title>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>


  
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

      <link rel="stylesheet" href="css/style_suggestion.css">

  
</head>

<body>
<br><br><br>
  <div class="container">

    <form class="well form-horizontal" action="upload_suggestion.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Contact Us</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Topic</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  
  <input  name="txtTopic"  class="form-control"  type="text" size="50">
    </div>
  </div>
</div>

<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Detail</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        
          <textarea class="ckeditor" name="txtDetail" ></textarea>
  </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  
  <input name="txtName"  class="form-control"  type="text" size="50">
    </div>
  </div>
</div>




<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
