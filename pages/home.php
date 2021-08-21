<?php 
session_start();
$connect = mysqli_connect('localhost','root','','justiceforyoudb');
 ?>
<!DOCTYPE html> 
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Justice For You</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<?php include('header.php') ?>
	<body>
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Lawyer, Make an Appointment</h1>
							<p>Discover the best Lawyer the most suitable to you.</p>
						</div>
                         
						<!-- Search -->
						<div class="search-box">
							<form action="home.php" method='POST'>
								<div class="form-group search-location">
									<input type="text" class="form-control" name='speciality[]' placeholder="Search practice area">
									<span class="form-text">Based on your sector</span>
								</div>
								<div class="form-group search-info">
									<input type="text" class="form-control" name='speciality[]' placeholder="Search gender or position">
									<span class="form-text">Ex : Attorney or Lawyer</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn" name='btnSearch'><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->
						
					</div>
				</div>
			</section>
			<?php 
if(isset($_POST['btnSearch']))
{

 $speciality=$_POST['speciality'];
  foreach ($speciality as $name) {
      $SELECT2="SELECT * FROM lawyer l, sector s
                WHERE  s.sectorid=l.sectorid AND (s.sectorname='$name' OR l.gender='$name' OR l.lposition='$name')
                Order By lawyerid Desc";
      $ret2=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret2);
 
        for ($col=0; $col <$count2 ; $col++) { 
               if($count2>0)
      {
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
        $feedback=$selectrow['feedback'];
        $avgrating=$selectrow['avgrating'];
        $totalrate=$selectrow['totalrate'];
        echo "<div class='card'>
                <div class='card-body'>
                  <div class='doctor-widget'>
                    <div class='doc-info-left'>
                      <div class='doctor-img'>
                        <a href='doctor-profile.html'>
                          <img src='$lavatar' class='img-fluid' alt='$lname'>
                        </a>
                      </div>
                      <div class='doc-info-cont'>
                        <h4 class='doc-name'><a href='doctor-profile.html'>$lname</a></h4>
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
                                  </div>" ;
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
                     
            
                      echo "<div class='clinic-details'>
                          <p class='doc-location'><i class='fas fa-map-marker-alt'></i> $address</p>
    
                        </div>
                      </div>
                    </div>
                    <div class='doc-info-right'>
                      <div class='clini-infos'>
                        <ul>
                          <li><i class='far fa-thumbs-up'></i> $totalrate</li>
                          <li><i class='far fa-comment'></i> $feedback Feedback</li>
                          <li><i class='fas fa-map-marker-alt'></i>$address</li>
                          <li><i class='far fa-money-bill-alt'></i>$ $pricepersession </li>
                        </ul>
                      </div>
                      <div class='clinic-booking'>
                        <a class='view-pro-btn' href='lawyerprofiledisplay.php?id=$lawyerid'>View Profile</a>
                        <a class='apt-btn' href='bookingcalendar.php?id=$lawyerid'>Book Appointment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";  

    }
    else
    {
      echo "<p> Sorry! Not Found.</p>";
    }
}
}





      
}
?>
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Specialities of Lawyers</h2>
						<p class="sub-title">You can see specilization practice areas of our firm.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
							
							<?php 
          $select="Select * FROM sector";
          $run=mysqli_query($connect,$select);
          $count=mysqli_num_rows($run);
          for ($i=0; $i < $count ; $i++) { 
            $row=mysqli_fetch_array($run);
            $sectorname=$row['sectorname'];
            $sectorimage=$row['sectorimage'];
            $sectorid=$row['sectorid'];
            echo"	<div class='speicality-item text-center'>
									<div class='speicality-img'>
										<img src='$sectorimage' class='img-fluid' alt='$sectorname'>
										<span><i class='fa fa-circle' aria-hidden='true'></i></span>
									</div>
									<p>$sectorname</p>
								</div>	";
          }
                  ?>

							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
		  
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book Our Lawyers</h2>
							
							</div>
							<div class="about-content">
								<p>Deliver the instant response and gratification that your potential clients now expect 24/7 with LawTap.
                                Improve the return on your existing marketing investments - from your website and email newsletters to Google and Facebook.
                                Convert more potentials to new clients with LawTap than website contact forms, website chat bots, phone tag and trying to schedule appointments over email.</p>					
							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
							
								<?php 
							$SELECT="SELECT * FROM lawyer l, sector s
    WHERE s.sectorid=l.sectorid
    Order By lawyerid Desc";
    $ret=mysqli_query($connect,$SELECT);
    $count=mysqli_num_rows($ret);
    for ($row=0; $row <$count ; $row+=3) { 
      $SELECT2="SELECT * FROM lawyer l, sector s
                WHERE s.sectorid=l.sectorid
                Order By lawyerid Desc
                Limit $row,3";
      $ret2=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret2);
      for ($col=0; $col <$count2 ; $col++) { 

       $sectordata=mysqli_fetch_array($ret);
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
        echo "<div class='profile-widget'>
									<div class='doc-img'>
										<a href='#'>
											<img  alt='User Image' src='$lavatar' width='200px' height='200px'>
										</a>
										<a href='javascript:void(0)' class='fav-btn'>
											<i class='far fa-bookmark'></i>
										</a>
									</div>
									<div class='pro-content'>
										<h3 class='title'>
											<a href='doctor-profile.htm'>$lname</a> 
											<i class='fas fa-check-circle verified'></i>
										</h3>
										<p class='speciality'>$education</p>";
										 if($avgrating>=1 and $avgrating<2)
                                                                     {
                                                                     echo "<div class='review-count rating'>
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
                     
									echo "<ul class='available-info'>
											<li>
												<i class='fas fa-map-marker-alt'></i> $address
											</li>
											<li>
												<i class='far fa-money-bill-alt'></i> $pricepersession
												<i class='fas fa-info-circle' data-toggle='tooltip' title='$sectorname'></i>
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
								</div>";  

      }

    } ?>
								<!-- Doctor Widget -->
								
							</div>
						</div>
				   </div>
				</div>
			</section>
			<?php include('footer.php') ?>
       
     </div>
     <!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Slick JS -->
    <script src="assets/js/slick.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
  </body>

<!-- doccure/index.html  30 Nov 2019 04:12:03 GMT -->
</html>