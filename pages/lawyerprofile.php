<?php   include('lawyerheader.php') ?>
<?php 
if (isset($_POST['btnupdate'])) 
{
    $ademail=$_POST['txtemail'];
    $adname=$_POST['txtname'];
    $adage=$_POST['txtage'];
    $adphnumber=$_POST['txtphnumber'];
    $adaddress=$_POST['txtaddress'];
    $update="Update lawyer
            set lname='$adname',
            lage='$adage',
            laddress='$adaddress',
            lphoneno='$adphnumber',
            lsalary='$adsalary',
            lexperience='$adexperience'
            where lemail='$ademail'";
    $run=mysqli_query($connect,$update);

    if ($run) 
    {
        echo "<script>alert('Update');
              window.location.assign('lawyerprofile.php')
        </script>";     
    }
    else
    {
        echo mysqli_error($connect);
    }

}
if (isset($_POST['btnupload'])) 
{
   $lemail=$_POST['txtemail'];
    $avatar = $_FILES['fileavatar']['name']; 
  if($avatar)
     {
      $folder= "../image/";
       $filename=$folder.$avatar;
        $check=copy($_FILES['fileavatar']['tmp_name'],$filename);
   }  
    $update="Update lawyer
            set lavatar='$filename'
            where lemail='$lemail'";
    $run=mysqli_query($connect,$update);

    if ($run) 
    {
        echo "<script>alert('Update')
        window.location.assign('lawyerprofile.php')
        </script>";     
    }
    else
    {
        echo mysqli_error($connect);
    }

}



?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
         <title>Justice For You</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
        <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="lawyerprofile.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Lawyer Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- /Breadcrumb -->
            
            <!-- Page Content -->
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
                                            <li class="active">
                                                <a href="lawyerprofile.php">
                                                    <i class="fas fa-user-cog"></i>
                                                    <span>Profile Settings</span>
                                                </a>
                                            </li>
                                            <li>
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
                            <div class="card">
                                <div class="card-body">
                                    
                                    <!-- Profile Settings Form -->
                                    <form method='POST' enctype="multipart/form-data">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <div class="change-avatar">
                                                        <div class="profile-img">
                                                            <img src="<?php echo $adavatar ?>" alt="<?php echo $adname ?>">
                                                        </div>
                                                        <div class="upload-img">

                                                               
                                                            <div class="change-photo-btn">
                                                                 <input type="file" class="upload" name='fileavatar'><i class="fa fa-upload"></i> Photo Gallery</button>
                                                                
                                                            </div>
                                                            <button class='btn btn-xs btn-light' style='color:black;' type='submit' name='btnupload'>Upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $adname ?>" name='txtname'>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>NRC NUMBER</label>
                                                    <input type="text" class="form-control" value="<?php echo $adnrcnumber ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <div>
                                                        <input type="text" class="form-control" value="<?php echo $adage ?> years" name='txtage'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control" value="<?php echo $adposition ?> " readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Email ID</label>
                                                    <input type="email" class="form-control" value="<?php echo $ademail ?>" name='txtemail' readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" value="<?php echo $adphnumber?>" class="form-control" name='txtphnumber'>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                <label>Address</label>
                                                    <input type="text" class="form-control" value="<?php echo $adaddress ?>" name='txtaddress'>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Education</label>
                                                    <input type="text" class="form-control" value="<?php echo $adeducation ?>" name='txteducation' readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="text" class="form-control" value="<?php echo $adsalary ?>MMK" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-section">
                                            <button type="submit" class="btn btn-primary submit-btn" name='btnupdate'>Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- /Profile Settings Form -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>      
<?php include('footer.php') ?>
   
    </body>
</html> 