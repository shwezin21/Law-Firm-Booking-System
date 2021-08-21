<?php 
$connect = mysqli_connect('localhost','root','','justiceforyoudb');
session_start();
if(isset($_POST['btnSearch']) )
{
    $email=$_POST['txtEmail'];
    $_SESSION['email']=$email;
    $slquery="SELECT * FROM admin
            WHERE ademail='$email'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
   if($row>0)
   {
    
     echo          "<script>window.location.assign('adminnewpassword.php?email=$email')</script>
                   ";             
   }
   else
   {
    $slquery="SELECT * FROM lawyer
            WHERE lemail='$email'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
   if($row>0)
   {
    
     echo          "<script>window.location.assign('lawyernewpassword.php?email=$email')</script>
                   ";             
   }
   else
   {
    $slquery="SELECT * FROM client
            WHERE cemail='$email'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
   if($row>0)
   {
    
     echo          "<script>window.location.assign('clientnewpassword.php?email=$email')</script>
                   ";             
   }
      else
     {
      echo "<script>alert('Your account does not have!')</script>";
     }

   }

   }
     
}
 ?>
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
 <?php include('header.php') ?>
 <body>
 <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
              <div class="forgot">
                  <h2>Forgot your password?</h2>
              </div>
              <form class="card mt-4" action='findingaccount.php' method='POST'>
                  <div class="card-body">
                      <div class="form-group"> <label for="email-for-pass">Enter your email address</label> <input class="form-control" type="text" id="email-for-pass" name='txtEmail' required=""><small class="form-text text-muted">Enter the email address you used during the registration on sign up page.</small> </div>
                  </div>
                  <div class="card-footer"> <button class="btn btn-xs btn-success" type="submit" name='btnSearch'>Get New Password</button> <a href='signin.php' class="btn btn-xs btn-danger" type="submit">Back to Login</button> </a>
              </form>
          </div>
      </div>
  </div>
</div>
  </body>
  <?php include('footer.php') ?>
</html>


