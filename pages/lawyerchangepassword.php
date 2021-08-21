<?php   include('lawyerheader.php') ?>
<?php 
if (!isset($_SESSION['lawyeremail']))
{
	echo "<script>alert('Please sign in');
					window.location.assign('signin.php');
		</script>";	
}
if (isset($_POST['btnchange'])) 
{  
   $Email=$_SESSION['lawyeremail'];
	$Current=sha1($_POST['txtcurrentpassword']);
	$New=sha1($_POST['txtnewpassword']);
	$Confirm=sha1($_POST['txtconfirmpassword']);
  $select= "SELECT * FROM `lawyer`
            WHERE `lemail`='$Email'";
  $selectquery=mysqli_query($connect,$select);
   $row=mysqli_fetch_array($selectquery);
   $password=$row['lpassword'];
   if($Current!=$password)
   {
       echo"<script>  alert('Your current password is incorrect');
              window.location.assign('findingaccount.php')
    </script>"; 
   }
    
		
   else
   {
		  $update=
       "UPDATE lawyer SET
                lpassword='$New',
             lconfirmpassword='$Confirm'
                WHERE lpassword='$Current' and lemail='$Email'";
        $run=mysqli_query($connect,$update);

        if ($run)
       {
                   echo "<script>alert('Update')
                    window.location.assign('signin.php')
                         </script>"; 
    
    
           }
           else
           {
             mysqli_error($connect);
           }
    }	
}
?>
<html>
<head>
	<title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">        
        <!-- Fontawesome CSS -->
      
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
 <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
 <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
 
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

    </head>
    <body>
       <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="lawyerprofile.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Change Password</h2>
                        </div>
                    </div>
                </div>
            </div>
           
            
           <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                        
                            <!-- Profile Sidebar -->
                            <div class="profile-sidebar">
                                <div class="widget-profile pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="#" class="booking-doc-img">
                                            <img src="<?php echo $adavatar?>" alt="<?php echo $adname?>">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3><?php echo $adname?></h3>
                                            
                                            <div class="patient-details">
                                                <h5 class="mb-0"><?php echo $adposition ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-widget">
                                    <nav class="dashboard-menu">
                                        <ul>
                                            <li>
                                                <a href="appointmentdisplay.php">
                                                    <i class="fas fa-calendar-check"></i>
                                                    <span>Appointments</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="myclients.php">
                                                    <i class="fas fa-user-injured"></i>
                                                    <span>My Clients</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="lawyerratingview.php">
                                                    <i class="fas fa-star"></i>
                                                    <span>Reviews</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="lawyerprofile.php">
                                                    <i class="fas fa-user-cog"></i>
                                                    <span>Profile Settings</span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="lawyerchangepassword.php">
                                                    <i class="fas fa-lock"></i>
                                                    <span>Change Password</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- /Profile Sidebar -->
                            
                        </div>
 <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="doc-review review-listing">
                                 
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(../image/lawyerimage.jpeg);">
                    <span class="login100-form-title-1">
                       Change Password
                    </span>
                </div>
 <form action='lawyerchangepassword.php' method='POST' enctype="multipart/form-data" class="login100-form validate-form">
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

</div>
</div>
<?php include('footer.php') ?>
  </body>   
</html>
