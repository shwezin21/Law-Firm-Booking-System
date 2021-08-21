<?php 
session_start();
$connect = mysqli_connect('localhost','root','','justiceforyoudb');
  if(isset($_POST['btnsignin']))
  {
    $email=$_POST['txtemail'];
    $Password = sha1($_POST['txtpassword']);
       $select = "SELECT * FROM client
               WHERE cemail='$email' AND cpassword = '$Password'";
    $run = mysqli_query($connect,$select);
    $count = mysqli_num_rows($run);  
    if($count>0)
    {
        $row=mysqli_fetch_array($run);
        $id=$row['clientid'];
        $email=$row['cemail'];
        $_SESSION['userid']= $id ;
        $_SESSION['clientemail']= $email ;
        if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["txtemail"],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("member_login1",$_POST["txtpassword"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
                if(isset($_COOKIE["member_login1"])) {
                    setcookie ("member_login1","");
                }
            }
        echo "<script>
        alert('Login Sucessfully')
        window.location.assign('clientprofile.php')
        </script>";
     }
     else
  {
        $select1 = "SELECT * FROM lawyer
               WHERE lemail='$email' AND lpassword = '$Password'";
    $run1 = mysqli_query($connect,$select1);

    $count1 = mysqli_num_rows($run1);  
    if($count1>0)
    {
        $row=mysqli_fetch_array($run1);
        $id=$row['lawyerid'];
        $email=$row['lemail'];
        $_SESSION['userid']= $id ;
        $_SESSION['lawyeremail']= $email ;
        if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["txtemail"],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("member_login1",$_POST["txtpassword"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
                if(isset($_COOKIE["member_login1"])) {
                    setcookie ("member_login1","");
                }
            }
        echo "<script>
        alert('Login Sucessfully')
        window.location.assign('lawyerprofile.php')
        </script>";
     }
     else
     {
        $select2 = "SELECT * FROM admin
               WHERE ademail='$email' AND adpassword = '$Password'";
    $run2 = mysqli_query($connect,$select2);
    $count2 = mysqli_num_rows($run2);  
    if($count2>0)
    {
        $row=mysqli_fetch_array($run2);
        $id=$row['adminid'];
        $email=$row['ademail'];
        $_SESSION['userid']= $id ;
        $_SESSION['adminemail']= $email ;
        if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["txtemail"],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("member_login1",$_POST["txtpassword"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
                if(isset($_COOKIE["member_login1"])) {
                    setcookie ("member_login1","");
                }
            }
        echo "<script>
        alert('Login Sucessfully')
        window.location.assign('admin/adminprofile.php')
        </script>";
     }
    
       
     else
     {
      echo "<script>alert('Your password is incorrect')</script>";
     }


  }
}    

}   
 ?>

<html>
<head>
  <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Justice For You</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
 <script>function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  
  </head>
      <?php include('header.php') ?>
  <body>

        <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(../image/lawyerimage.jpeg);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>
 <form action= "signin.php" method = "POST" enctype="multipart/form-data" class="login100-form validate-form">
       <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
      
       <span class="label-input100">Email</span>
        <input type="email" class="form-control" id="inputemail" name='txtemail' placeholder="Enter your email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
        <span class="focus-input100"></span>
      </div>
        <div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
      
       <span class="label-input100">Password</span>
        <input type = "password" class = "form-control" id="password" placeholder = "Enter your password" name='txtpassword' value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login1"]; } ?>" required><img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction()'>
        <span class="focus-input100"></span>
      </div>
      <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                              <label class="custom_check" for='remember'>
                            <input type="checkbox"  name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                             <span class="checkmark"></span> Remember me
                    </label>
                        </div>

                        <div>
                            <a href="findingaccount.php" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                          <div>
                            <a href="clientsignup.php" class="txt1">
                                Don't you have an account?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                         <input type="submit" class='btn btn-xs btn-primary' name="btnsignin" value="Log in">
                           </div>
                        </div> 
                    </div>
                </form>
                    

  <?php include('footer.php') ?>

<!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
  </body>

<!-- doccure/doctor-profile.html  30 Nov 2019 04:12:16 GMT -->
</html>