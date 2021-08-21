<?php   include('lawyerheader.php') ?>
<?php 
if(isset($_POST['btnlike']))
  {
    $id=$_POST['txtid'];
    $select="SELECT * FROM review
             WHERE ratingid='$id'";
    $run=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($run);
    $like=$row['like'];
    $r=$like+1;
    $update="UPDATE `review` SET 
            `like`='$r'
             WHERE `ratingid` ='$id'";
     $query=mysqli_query($connect,$update);

      }
      else if(isset($_POST['btndislike']))
      {
        $id=$_POST['txtid'];
       $select="SELECT * FROM review
             WHERE ratingid='$id'";
             $run=mysqli_query($connect,$select);
             $row=mysqli_fetch_array($run);
             $dislike=$row['dislike'];
             $r=$dislike+1;
             $update="UPDATE `review` SET 
            `dislike`='$r'
             WHERE `ratingid` ='$id'";
            $query=mysqli_query($connect,$update);
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
    <!-- Sidebar -->
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
                                            <li class="active">
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
                            <div class="doc-review review-listing">
                                 
                                <!-- Review Listing -->
                                <ul class="comments-list">

                                                   <?php  
                                                         $select="SELECT * FROM lawyer l, review r, client c
                                                       WHERE  l.lawyerid=r.lawyerid AND r.clientid=c.clientid AND l.lemail='$Email' ";
                                                          $run=mysqli_query($connect,$select);
                                                         $count=mysqli_num_rows($run);
                                                         for ($i=0; $i <$count ; $i++) { 
                                                         	$row=mysqli_fetch_array($run);
                                                         	$cavatar=$row['cavatar'];
                                                         	$cname=$row['clname'];
                                                         	$ratingnumber=$row['ratingnumber'];
                                                         	$ratingdate=$row['ratingdate'];
                                                         	$reviewdate=date("F j, Y ", strtotime($ratingdate)); 
                                                         	$ratingid=$row['ratingid'];
                                                         	$like=$row['like'];
                                                         	$dislike=$row['dislike'];
                                                         	$review=$row['review'];
                                                            {
                                                                echo "<form method='POST'>	<li>
												<div class='comment'>
													<input type='text' name='txtid' value='$ratingid' hidden>
													<img class='avatar avatar-sm rounded-circle' alt='User Image'  src='$cavatar'>
													<div class='comment-body'>
														<div class='meta-data'>
															<span class='comment-author'>$cname</span>
															<span class='comment-author'>$reviewdate</span>";

                                                         if($ratingnumber==1)
                                                                     {
                                                                     echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																	</div>"	;
                                                                     }
                                                                     else if($ratingnumber==2)
                                                                     {
                                                                     	echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																	</div>";
                                                                     }
                                                                      else if($ratingnumber==3)
                                                                     {
                                                                     	echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																	</div>";
                                                                     }
                                                                       else if($ratingnumber==4)
                                                                     {
                                                                     echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star'></i>
																	</div>";
                                                                     }
                                                                    
                                                                    else if($ratingnumber==5)
                                                                     {
                                                                     	echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																	</div>";
                                                                     }
                                                                     
                                                        
                                                         	echo "</div>							
														<p class='comment-content'>
															$review
														</p>
														<div class='comment-reply'>
															<p class='recommend-btn'>
																<span>$like <i class='far fa-thumbs-up'></i></span>
																<button class='like-btn' type='submit' name='btnlike' >
																	<i class='far fa-thumbs-up'></i> Like
																</button>
																<span>$dislike <i class='far fa-thumbs-down'></i> </span>
																<button href='#' class='dislike-btn' type='submit' name='btndislike'>
																	<i class='far fa-thumbs-down'></i> Unlike
																</button>
															</p>
														</div>
													</div>
												</div>
											</li>
											</form>";
                                                         }
                                                     }
                                         ?>

        
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html> 