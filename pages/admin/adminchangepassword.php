<?php include('admindata.php') ?>
<?php include('../function.php') ?>
<?php include('adminheader.php') ?>
<?php 
if (isset($_POST['btnchange'])) 
{  
   $Email=$_SESSION['adminemail'];
  $Current=sha1($_POST['txtcurrentpassword']);
  $New=sha1($_POST['txtnewpassword']);
  $Confirm=sha1($_POST['txtconfirmpassword']);
  $select= "SELECT * FROM `admin`
            WHERE `ademail`='$Email'";
  $selectquery=mysqli_query($connect,$select);
   $row=mysqli_fetch_array($selectquery);
   $password=$row['adpassword'];
  if($Current!=$password)
   {
       echo"<script>  alert('Your current password is incorrect');
              window.location.assign('../findingaccount.php')
    </script>"; 
   }
   else
   {
     $update=
       "UPDATE admin SET
                adpassword='$New',
               adconfirmpassword='$Confirm'
                WHERE adpassword='$Current' and ademail='$Email'";
      

  $run=mysqli_query($connect,$update);

  if ($run)
  {
    echo "<script>alert('Update')
              window.location.assign('../signin.php')</script>"; 
    
    
    }
    else
    {
      mysqli_error($connect);
    }
    
   }
  
}
 ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You - Payment List</title>
    
    <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
    
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    
    <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
     <div class="sidebar" id="sidebar" style='background-color: #1b5a90;'>
                <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="menu-title"> 
                <span>Main</span>
              </li>
              <li> 
                <a href="admindashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
              </li>
              <li> 
                <a href="appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
              </li>
              <li> 
                <a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
              </li>
              <li> 
                <a href="lawyermanage.php"><i class="fe fe-user-plus"></i> <span>Lawyer</span></a>
              </li>
              <li> 
                <a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
              </li>
              <li> 
                             <a href="timeslot.php"><img src='assets/img/icon-03.png' width='20px'>Time Slot</a>
                            </li>
              <li> 
                <a href="reviewdisplay.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
              </li>
              <li class="active"> 
                <a href="paymentlist.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
              </li>
              <li> 
                <a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
              </li>
    
              
          </div>
                </div>
            </div>
        <title>Change Password</title>
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
    
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    
    <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
 <link rel="stylesheet" type="text/css" href="../../css/util.css">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script>function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("cpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  var x = document.getElementById("npassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(../image/lawyerimage.jpeg);">
                    <span class="login100-form-title-1">
                       Change Password
                    </span>
                </div>
 <form action='adminchangepassword.php' method='POST' enctype="multipart/form-data" class="login100-form validate-form">
       <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
      
       <span class="label-input100">Current Password</span>
       <input type = "password" class = "form-control" id="cpassword" placeholder = "Enter your current password" name='txtcurrentpassword'  required><img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction2()'>
         <span class="focus-input100"></span>
      </div>
        <div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
        
       <span class="label-input100">New Password</span>
        <input type = "password" class = "form-control" id="npassword" placeholder = "Enter your new password" name='txtnewpassword' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required><img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction1()'>
        <span class="focus-input100"></span>
      </div>
     <div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
        
       <span class="label-input100">Confirm Password</span>
        <input type = "password" class = "form-control" id="password" placeholder = "Enter your confirm password" name='txtconfirmpassword' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
 title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required><img src='../image/eyeicon.png'width='25px' height='25px' class='eyeicon' onclick='myFunction()'>
        <span class="focus-input100"></span>
      </div>
       <div class="container-login100-form-btn">
       <input type="submit" class='btn btn-xs btn-primary' name="btnchange" value="Change">
        </div>
        </div> 
        </div>
       </form>
<script src="assets/js/jquery-3.2.1.min.js"></script>
    
    <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Datatables JS -->
    
    
    <!-- Custom JS -->
    <script  src="assets/js/script.js"></script>
    </body>
    </html>