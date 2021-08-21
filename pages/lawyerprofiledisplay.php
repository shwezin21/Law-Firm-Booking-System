<?php include('function.php') ?>
<?php 
   date_default_timezone_set("Asia/Rangoon");
   session_start();
   $connect = mysqli_connect('localhost','root','','justiceforyoudb');
  if(isset($_POST['btnaddreview']))
  {
  	if(!isset($_SESSION['clientemail']))
  	{
        echo "<script>alert('Please Login')
                       window.location.assign('signin.php')</script>";
  	}
  	else
  	{
  		$email=$_SESSION['clientemail'];
  		$select="SELECT * FROM client
  		         WHERE cemail='$email'";
  		 $run=mysqli_query($connect,$select);
  		 $row=mysqli_fetch_array($run);
  		 $clientid=$row['clientid'];
  		$review=$_POST['review'];
  		$rating=$_POST['rating'];
  		$ratingid=AutoID('review','ratingid','rating_',6);
  		$lawyerid=$_GET['id'];
  		$ratingdate=date("Y/m/d H:i:s");
  		$insert="INSERT INTO `review`(`ratingid`, `ratingnumber`, `review`,`ratingdate`,`clientid`, `lawyerid`) VALUES ('$ratingid','$rating','$review','$ratingdate','$clientid','$lawyerid')";
  		$run=mysqli_query($connect,$insert);
  		if($run)
  		{
  			echo "<script>alert('Rating sucessfully')
  			       </script>";
  		}
         else
         {
         	mysqli_error($connect);
         }

  	}
  }
  else if(isset($_POST['btnlike']))
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
	<head>
    <meta charset="utf-8">
    <title>Justice For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <!-- Favicons -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  
  </head>
<!-- doccure/doctor-profile.html  30 Nov 2019 04:12:16 GMT -->
	<body>

 <?php include('header.php') ?>
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lawyer Profile</li>
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
				<div class="container">

					<!-- Doctor Widget -->
				<?php 
    if(isset($_GET['id']))
   {
   	  $id=$_GET['id'];
   	  $SELECT2="SELECT * FROM lawyer l, sector s
                WHERE  s.sectorid=l.sectorid AND l.lawyerid='$id'";
      $ret=mysqli_query($connect,$SELECT2);
       $sectordata=mysqli_fetch_array($ret);
       $SELECT="SELECT  COUNT(r.ratingid) as feedback , 
   	            CAST(AVG(r.ratingnumber) AS DECIMAL(10,0)) As avgrating,
   	            SUM(r.ratingnumber) as totalrate
   	     	            FROM  review r, lawyer l
                WHERE l.lawyerid='$id' and l.lawyerid=r.lawyerid";
         $selectquery=mysqli_query($connect,$SELECT);
         $selectrow=mysqli_fetch_array($selectquery);
        $lname=$sectordata['lname'];
        $lavatar=$sectordata['lavatar'];
        $position=$sectordata['lposition'];
        $pricepersession=$sectordata['pricepersession'];
        $education=$sectordata['leducation'];
        $sectorimage=$sectordata['sectorimage'];
        $lawyerid=$sectordata['lawyerid'];
        $sectorname=$sectordata['sectorname'];
        $address=$sectordata['laddress'];
        $experience=$sectordata['lexperience'];
        $feedback=$selectrow['feedback'];
        $avgrating=$selectrow['avgrating'];
        $totalrate=$selectrow['totalrate'];
        $date=date('d-M-y');
        echo "<div class='card'>
                <div class='card-body'>
                  <div class='doctor-widget'>
                    <div class='doc-info-left'>
                      <div class='doctor-img'>
                        <a href='#'>
                          <img src='$lavatar' class='img-fluid' alt='$lname'>
                        </a>
                      </div>
                      <div class='doc-info-cont'>
                        <h4 class='doc-name'><a href='#'>$lname</a></h4>
                        <p class='doc-specialit'>$education</p>
                        <h5 class='doc-department'><img src='$sectorimage' class='img-fluid' alt='$sectorname'>$sectorname</h5>";
                          if($avgrating>=1 and $avgrating<2)
                                                                     {
                                                                     echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		<i class='fas fa-star'></i>
																		 <span class='d-inline-block average-rating'>$avgrating</span>
																	</div>"	;
                                                                     }
                                                                    else if($avgrating>=2 and $avgrating<3)
                                                                     {
                                                                     	echo "<div class='review-count rating'>
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
                                                                     	echo "<div class='review-count rating'>
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
                                                                     echo "<div class='review-count rating'>
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
                                                                     	echo "<div class='review-count rating'>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		<i class='fas fa-star filled'></i>
																		 <span class='d-inline-block average-rating'>$avgrating</span>
																	</div>";
                                                                     }
                     
            
                         
                  echo "     
                        <div class='clinic-details'>
                          <p class='doc-location'><i class='fas fa-map-marker-alt'></i> $address</p>
    
                        </div>
                      </div>
                    </div>
                    <div class='doc-info-right'>
                      <div class='clini-infos'>
                        <ul>
                          <li><i class='far fa-thumbs-up'></i>$totalrate</li>
                          <li><i class='far fa-comment'></i> $feedback Feedback</li>
                          <li><i class='fas fa-map-marker-alt'></i>$address</li>
                          <li><i class='far fa-money-bill-alt'></i>$ $pricepersession </li>
                        </ul>
                      </div>
                      <div class='clinic-booking'>
                        <a class='apt-btn' href='bookingcalendar.php?id=$lawyerid'>Book Appointment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";  
   }   
				?>
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name"><?php echo $education ?></a>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
									
											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name"><?php echo $experience ?></a>
																</div>
															</div>
														</li>

													</ul>
												</div>
											</div>
											<!-- /Experience Details -->
								
											<!-- Awards Details -->
											
											
											<!-- Services List -->
											
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													<li><?php echo $sectorname ?></li>
													
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
									<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">
										
											<!-- Comment List -->
											
													<?php  
													if(isset($_POST['btnshowall']))
													{
														$lawyerid=$_GET['id'];
                                                        $select="SELECT * FROM lawyer l, review r, client c
                                                       WHERE  l.lawyerid=r.lawyerid AND r.clientid=c.clientid AND l.lawyerid='$lawyerid' ";
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
													}
													else
													{
                                                            $lawyerid=$_GET['id'];
                                                        $select="SELECT * FROM lawyer l, review r, client c
                                                       WHERE  l.lawyerid=r.lawyerid AND r.clientid=c.clientid AND l.lawyerid='$lawyerid'
                                                       AND r.ratingnumber=(SELECT MAX(r.ratingnumber) FROM review r, lawyer l, client c
                                                                           WHERE l.lawyerid='$lawyerid' and r.lawyerid = l.lawyerid 
                                                                           AND c.clientid=r.clientid)
                                                         ";
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
																	<i class='far fa-thumbs-up'></i>Like
																</button>
																<span>$dislike <i class='far fa-thumbs-down'></i></span>
																<button href='#' class='dislike-btn' type='submit' name='btndislike'>
																	<i class='far fa-thumbs-down'></i>Unlike
																</button>
															</p>
														</div>
													</div>
												</div>
											</li>
											</form>";
										}
									}
													 
													 }  
													?>
													
					
											</ul>
										
										<!-- Show All -->
										<!-- Show All -->
										<div class="all-feedback text-center">
											<form method='POST'>
											<button class="btn btn-primary btn-sm" type='submit' name='btnshowall'>
												<?php 
                                                        $select="SELECT COUNT(ratingid) as numberofrow FROM review

                                                        WHERE lawyerid='$lawyerid'";
                                                        $run=mysqli_query($connect,$select);
                                                        $row=mysqli_fetch_array($run);
                                                        $rownumber=$row['numberofrow'];
												 ?>
												Show all feedback <strong>(<?php echo $rownumber ?>)</strong>
											</button>
										</form>
										</div>
										<!-- /Show All -->
										
									</div>
												
										
										
										<!-- /Show All -->
										
									<!-- /Review Listing -->
								
									<!-- Write Review -->
									<div class="write-review">
										<h4>Write a review for <strong><?php echo $lname ?></strong></h4>
										
										<!-- Write Review Form -->
										<form method='POST'>
											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<input id="star-5" type="radio" name="rating" value="5">
													<label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-4" type="radio" name="rating" value="4">
													<label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-3" type="radio" name="rating" value="3">
													<label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-2" type="radio" name="rating" value="2">
													<label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-1" type="radio" name="rating" value="1">
													<label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
												</div>
											</div>
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="100" name='review' class="form-control" required=""></textarea >
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn" name='btnaddreview'>Add Review</button>
											</div>
										</form>
										<!-- /Write Review Form -->
										
									</div>
									<!-- /Write Review -->
						
								</div>
								<!-- /Reviews Content -->
								
								<!-- Business Hours Content -->

								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span><?php echo $date ?></span></div>
														</div>
														<?php 
                                                        $select="Select * FROM availableslot";
                                                         $run=mysqli_query($connect,$select);
                                                        $count=mysqli_num_rows($run);
                                                        for ($i=0; $i < $count ; $i++) { 
                                                          $row=mysqli_fetch_array($run);
                                                          $slotstart=$row['slotstart'];
                                                          $slotend=$row['slotend'];
                                                          echo "<div class='listing-day'>
                                                          <div class='day'>Booking Available Hour</div>
                                                         <div class='time-items'>
                                                        <span class='time'>$slotstart-$slotend</span>
                                                         </div>
                                                         
                                                         </div>
                                                         ";
                                                         
                                                        }
                                                      
                                                                ?>

														<div class="listing-day closed">
                              <div class="day">Sunday</div>
                              <div class="time-items">
                                <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                              </div>
                            </div>
                          </div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
   
			
     <?php include('footer.php') ?>					
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		
		<!-- Video Call Modal -->
		
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