<?php   include('lawyerheader.php') ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
    <head>
     <link href="assets/img/favicon.png" rel="icon">
        <meta charset="utf-8">
        <title>Justice For You</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <!-- Sidebar -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="lawyerprofile.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Lawyers</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">My Lawyers</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            
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
                                            <li class="active">
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

                        <div class='col-md-7 col-lg-8 col-xl-9'>
                            <div class='appointments'>
                                  

                              <?php 
 $SELECT2="SELECT * FROM lawyer l, appointment b, client c, availableslot avs
                WHERE l.lawyerid=b.lawyerid AND c.clientid=b.clientid and avs.slotid=b.slotid
                AND l.lemail='$Email'";
      $ret=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret);
      for ($col=0; $col <$count2 ; $col++) { 
       $sectordata=mysqli_fetch_array($ret);
        $cavatar=$sectordata['cavatar'];
        $cname=$sectordata['clname'];
        $appointmentdate=$sectordata['appointmentdate'];
        $caddress=$sectordata['caddress'];
        $cemail=$sectordata['cemail'];
        $cphoneno=$sectordata['cphoneno'];
        $slotstart=$sectordata['slotstart'];
        $slotend=$sectordata['slotend'];
        $bookingid=$sectordata['bookingid'];
        $status=$sectordata['status'];
        echo "
                            
                                <!-- Appointment List -->
                                <div class='appointment-list'>
                                    <div class='profile-info-widget'>
                                        <a href='#' class='booking-doc-img'>
                                            <img src='$cavatar' alt='$cname'>
                                        </a>
                                        <div class='profile-det-info'>
                                            <h3><a href='patient-profile.html'>$cname</a></h3>
                                            <div class='patient-details'>
                                                <h5><i class='far fa-clock'></i>$appointmentdate</h5>
                                                <h5><i class='far fa-clock'></i> $slotstart-$slotend</h5>
                                                <h5><i class='fas fa-map-marker-alt'></i>$caddress</h5>
                                                <h5><i class='fas fa-envelope'></i>$cemail</h5>
                                                <h5 class='mb-0'><i class='fas fa-phone'></i>$cphoneno</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='appointment-action'>
                                        <a href='#' class='btn btn-sm bg-info-light' data-toggle='modal' data-target='#appt_details'>
                                            <i class='far fa-eye'></i> View
                                        </a>
                                         <a href='#' class='btn btn-sm bg-info-light'>
                                         $status
                                        </a>
                                    </div>
                                </div>
                                <div class='modal fade custom-modal' id='appt_details'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Appointment Details</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <ul class='info-details'>
                            <li>
                                <div class='details-header'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <span class='title'>$bookingid</span>
                                            <span class='text'>$appointmentdate</span>
                                            <span class='text'>$slotstart-$slotend</span>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='text-right'>
                                                <button type='button' class='btn bg-success-light btn-sm' id='topup_status'>Completed</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class='title'>Status:</span>
                                <span class='text'>Completed</span>
                            </li>
                            <li>
                                <span class='title'>Confirm Date:</span>
                                <span class='text'>29 Jun 2019</span>
                            </li>
                            <li>
                                <span class='title'>Paid Amount</span>
                                <span class='text'>$450</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>";
                            }

 ?>
 </div>
 </div>
 </div>
 </div>
 </div>  
        
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>