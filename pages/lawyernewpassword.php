<?php 
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb');	
if (isset($_POST['btnchange'])) 

{
       $password= $_POST['txtpassword'];
       $email=$_SESSION['email'];
       $spassword=sha1($password);
       $update="UPDATE lawyer SET
                lpassword='$spassword',
                lconfirmpassword='$spassword'
                WHERE lemail='$email'";
                $run=mysqli_query($connect,$update);
                if($run)
                  {
   	                 
                      echo "<script>alert('Change sucessfully')
                         window.location.assign('signin.php')</script>";

   	                    
                  }
                else
                  {
                    	mysqli_error($connect);
                  }
                  
}

?>
<html>
<head>
	<title>New Password</title>
 <title>Justice For You</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
<script>function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<style>
.eyeicon
{
  margin-top: -30px;
 margin-left: 650px;
 cursor: pointer;
}
@media (max-width:767px) {
        .eyeicon
    {
        margin-top: -30px;
        margin-left: 300px;

    }
    }
</style>
 </head>
 <body>
  <?php include('header.php') ?>
 <div class="container padding-bottom-2x mb-1 mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
              <div>
                  <h2>New Password</h2>
              </div>
              <form class="card mt-4" action='lawyernewpassword.php' method='POST'>
                  <div class="card-body">
                      <div class="form-group"> <label for="password">Enter your new password</label> <input class="form-control" type="text" id="password" name='txtpassword' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required="" ><img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction()'><small class="form-text text-muted">Enter your new password</small> </div>
                  </div>
                  <div class="card-footer"> <button class="btn btn-xs btn-success" type="submit" name='btnchange'>Change</button> <a href='signin.php' class="btn btn-xs btn-danger" type="submit">Back to Login</button> </a>
                  </div>
                </div>
</form>
</div>
</div>
</div>
   <?php include('footer.php') ?>
 </body>

 </html>