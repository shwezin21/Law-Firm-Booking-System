<?php   include('lawyerheader.php') ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You - Lawyer Page</title>
        
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        </style>

        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="lawyerprofile.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">My Clients</h2>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Sidebar -->
           
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
                                            <li  class="active">
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

                                  
                    <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="row row-grid">
                              <?php 
 $SELECT2="SELECT * FROM lawyer l, appointment b, client c, availableslot avs
                WHERE l.lawyerid=b.lawyerid AND c.clientid=b.clientid and avs.slotid=b.slotid
                AND l.lemail='$Email'
                GROUP BY c.clname";
      $ret=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret);
      for ($col=0; $col <$count2 ; $col++) { 
       $sectordata=mysqli_fetch_array($ret);
        $cavatar=$sectordata['cavatar'];
        $cname=$sectordata['clname'];
        $clientid=$sectordata['clientid'];
        $caddress=$sectordata['caddress'];
        $cemail=$sectordata['cemail'];
        $cphoneno=$sectordata['cphoneno'];
        $cage=$sectordata['cage'];
        echo "
                <div class='col-md-6 col-lg-4 col-xl-3'>
                <div class='card widget-profile pat-widget-profile'>
                                        <div class='card-body'>
                                            <div class='pro-widget-content'>
                                                <div class='profile-info-widget'>
                                                    <a href='#' class='booking-doc-img'>
                                                        <img src='$cavatar' alt='$cname'>
                                                    </a>
                                                    <div class='profile-det-info'>
                                                        <h3><a href='patient-profile.html'>$cname</a></h3>
                                                        
                                                        <div class='patient-details'>
                                                            <h5><b>Client ID :</b>$clientid</h5>
                                                            <h5 class='mb-0'><i class='fas fa-map-marker-alt'></i>$caddress</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='patient-info'>
                                                <ul>
                                                    <li>Phone <span>$cphoneno</span></li>
                                                    <li>Age <span>$cage</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }

 ?>
 </div>
 </div>
 </div>
 </div>
 </div>  
 <?php include('footer.php') ?>
        
    </body>

<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
</html>
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>