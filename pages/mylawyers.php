<?php   include('clientheader.php') ?>

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
                                    <li class="breadcrumb-item"><a href="clientprofile.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Favourites</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">My Favourites</h2>
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
                                                <h5 class="mb-0">Client</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-widget">
                                    <nav class="dashboard-menu">
                                        <ul>
                                            <li>
                                                <a href="clientappointmentdisplay.php">
                                                    <i class="fas fa-calendar-check"></i>
                                                    <span>Appointments</span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="mylawyers.php">
                                                    <i class="fas fa-star"></i>
                                                    <span>Favourite</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="clientprofile.php">
                                                    <i class="fas fa-user-cog"></i>
                                                    <span>Profile Settings</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="clientchangepassword.php">
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

      $SELECT2="SELECT * FROM lawyer l, sector s, appointment b, payment p, client c
    WHERE s.sectorid=l.sectorid and b.bookingid=p.bookingid AND c.clientid = b.clientid AND l.lawyerid=b.lawyerid AND c.clientid='$clientid'
    GROUP BY l.lname";
      $ret2=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret2);
      for ($col=0; $col <$count2 ; $col++) { 

       $sectordata=mysqli_fetch_array($ret2);
        $lname=$sectordata['lname'];
        $lavatar=$sectordata['lavatar'];
        $position=$sectordata['lposition'];
        $pricepersession=$sectordata['pricepersession'];
        $education=$sectordata['leducation'];
        $sectorimage=$sectordata['sectorimage'];
        $lawyerid=$sectordata['lawyerid'];
        $sectorname=$sectordata['sectorname'];
        $address=$sectordata['laddress'];
         $SELECT="SELECT  COUNT(r.ratingid) as feedback , 
                CAST(AVG(r.ratingnumber) AS DECIMAL(10,0)) As avgrating,
                SUM(r.ratingnumber) as totalrate
                      FROM  review r, lawyer l
                WHERE l.lawyerid='$lawyerid' and l.lawyerid=r.lawyerid";
         $selectquery=mysqli_query($connect,$SELECT);
         $selectrow=mysqli_fetch_array($selectquery);
        $avgrating=$selectrow['avgrating'];
        echo "
                <div class='col-md-6 col-lg-4 col-xl-3'>
                  <div class='profile-widget'>
                    <div class='doc-img'>
                    <a href='#' class='booking-doc-img'>
                                                        <img src='$lavatar' alt='$lname' width='150px' height='150px'>
                                                    </a>
                      <a href='javascript:void(0)' class='fav-btn'>
                        <i class='far fa-bookmark'></i>
                      </a>
                    </div>
                    <div class='pro-content'>
                      <h3 class='title'>
                        <a href='doctor-profile.html'>$lname</a> 
                        <i class='fas fa-check-circle verified'></i>
                      </h3>
                      <p class='speciality'>$sectorname</p>";
                       if($avgrating>=1 and $avgrating<2)
                                                                     {
                                                                     echo "<div class='rating'>
                                                                        <i class='fas fa-star filled'></i>
                                                                        <i class='fas fa-star'></i>
                                                                        <i class='fas fa-star'></i>
                                                                        <i class='fas fa-star'></i>
                                                                        <i class='fas fa-star'></i>
                                                                         <span class='d-inline-block average-rating'>$avgrating</span>
                                                                      </div>" ;
                                                                     }
                                                                    else if($avgrating>=2 and $avgrating<3)
                                                                     {
                                                                      echo "<div class='rating'>
                                                                               <i class='fas fa-star filled'></i>
                                                                               <i class='fas fa-star filled'></i>
                                                                               <i class='fas fa-star'></i>
                                                                               <i class='fas fa-star'></i>
                                                                               <i class='fas fa-star'></i>
                                                                                <span class='d-inline-block average-rating'>$avgrating</span>
                                                                             </div>";
                                                                     }
                                                                      else if($avgrating>=3 and $avgrating<4)
                                                                     {
                                                                      echo "<div class='rating'>
                                                                                <i class='fas fa-star filled'></i>
                                                                                <i class='fas fa-star filled'></i>
                                                                                <i class='fas fa-star filled'></i>
                                                                                <i class='fas fa-star'></i>
                                                                                <i class='fas fa-star'></i>
                                                                                 <span class='d-inline-block average-rating'>$avgrating</span>
                                                                              </div>";
                                                                     }
                                                                       else  if($avgrating>=4 and $avgrating<5)
                                                                     {
                                                                     echo "<div class='rating'>
                                                                          <i class='fas fa-star filled'></i>
                                                                          <i class='fas fa-star filled'></i>
                                                                          <i class='fas fa-star filled'></i>
                                                                          <i class='fas fa-star filled'></i>
                                                                          <i class='fas fa-star'></i>
                                                                           <span class='d-inline-block average-rating'>$avgrating</span>
                                                                        </div>";
                                                                     }
                                                                    
                                                                    else  if($avgrating>=5 and $avgrating<6)
                                                                     {
                                                                      echo "<div class='rating'>
                                                                              <i class='fas fa-star filled'></i>
                                                                              <i class='fas fa-star filled'></i>
                                                                              <i class='fas fa-star filled'></i>
                                                                              <i class='fas fa-star filled'></i>
                                                                              <i class='fas fa-star filled'></i>
                                                                               <span class='d-inline-block average-rating'>$avgrating</span>
                                                                            </div>";
                                                                     }
                     
                  echo"    <ul class='available-info'>
                        <li>
                          <i class='fas fa-map-marker-alt'></i> $address
                        </li>
                        <li>
                          <i class='far fa-money-bill-alt'></i> $pricepersession <i class='fas fa-info-circle' data-toggle='tooltip' title='Lorem Ipsum'></i>
                        </li>
                      </ul>
                      <div class='row row-sm'>
                        <div class='col-6'>
                          <a href='lawyerprofiledisplay.php?id=$lawyerid' class='btn view-btn'>View Profile</a>
                        </div>
                        <div class='col-6'>
                          <a href='bookingcalendar.php?id=$lawyerid' class='btn book-btn'>Book Now</a>
                        </div>
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