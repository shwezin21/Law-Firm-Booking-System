<?php include('header.php');
$connect=mysqli_connect('localhost','root','','justiceforyoudb'); 
if(isset($_POST['btnsubmit']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $message=$_POST['message'];
   $insert="INSERT INTO `contactus`(`contactname`, `contactemail`, `contactmassage`) VALUES
           ('$name','$email','$message') ";
   $insertquery=mysqli_query($connect,$insert);
   if($insertquery)
   {
    echo "<script>alert('Insert Sucessfully')</script>";
   }
   else
   {
    mysqli_error($connect);
   }
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Justice For You</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal"  method="post">
          <fieldset>
            <legend>Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="email" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name='btnsubmit'>Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>
<div>
  <h1>Our Location</h1>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13890440.889718419!2d106.43765126394705!3d16.700379546820923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1590215873252!5m2!1sen!2smm" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<?php include('footer.php') ?>
</body>
</html>

