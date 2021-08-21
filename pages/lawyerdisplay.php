<?php 
session_start();
$connect = mysqli_connect('localhost','root','','justiceforyoudb');
 ?>

<html>
<head>
  <head>
<meta charset="utf-8">
    <title>Justice For You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
<body>
      <?php include('header.php') ?>
      <div class="breadcrumb-bar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-8 col-12">
              <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Search</li>
                </ol>
              </nav>
            </div>

              <div class="col-md-4 col-12">
                   <form action='lawyerdisplay.php' method='POST'>
                 <div class="sort-by">
                    <select name='txtsearch' class='btn btn-xs btn-light'>
                      <option value='rating'>Rating</option>
                      <option value='popular'>Popular</option>
                      <option value='lowfees'>Low Fees</option>
                      <option value='highfees'>Highest Fees</option>
                    </select>
                    <button type='submit' name='btnsort' class='btn btn-xs btn-light' style='color:black;'>Sort</button>
                    </div>
                  </form>
                </div>
      </div>
    </div>
  </div>
      <!-- /Breadcrumb -->
      
      <!-- Page Content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
            
              <!-- Search Filter -->
              <form action='lawyerdisplay.php' method='POST'>
              <div class="card search-filter">
                <div class="card-header">
                  <h4 class="card-title mb-0">Search Filter</h4>
                </div>
                <div class="card-body">
                   
                <div class="filter-widget">
                  <h4>Gender</h4>
                  <div>
                    <label class="custom_check">
                      <input type="checkbox" name="speciality[]" value='Male'>
                      <span class="checkmark"></span> Male Lawyer
                    </label>
                  </div>
                  <div>
                    <label class="custom_check">
                      <input type="checkbox" name="speciality[]" value='Female'>
                      <span class="checkmark"></span> Female Lawyer
                    </label>
                  </div>
                </div>
                <div class="filter-widget">
                  <h4>Select Specialist</h4>
                  <?php 
          $select="Select * FROM sector";
          $run=mysqli_query($connect,$select);
          $count=mysqli_num_rows($run);
          for ($i=0; $i < $count ; $i++) { 
            $row=mysqli_fetch_array($run);
            $sectorname=$row['sectorname'];
            $sectorid=$row['sectorid'];
            echo"<div>
                    <label class='custom_check'>
                      <input type='checkbox' name='speciality[]' value='$sectorname'>
                      <span class='checkmark'></span> $sectorname
                    </label>
                  </div>";
          }
                  ?>

                  
                </div>
                  <div class="btn-search">
                    <button type="submit" name='btnSearch' class="btn btn-block">Search</button>
                  </div>  
                </div>
              </div>
            </form>
              <!-- /Search Filter -->
              
            </div>
            
            <div class="col-md-18 col-lg-10 col-xl-9">

<?php  
if(isset($_POST['btnSearch']))
{
  $speciality=$_POST['speciality'];
  foreach ($speciality as $name) {
      $SELECT2="SELECT * FROM lawyer l, sector s
                WHERE  s.sectorid=l.sectorid AND (s.sectorname='$name' OR l.gender='$name')
                Order By lawyerid Desc";
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

    }
 
}
            else if(isset($_POST['btnsort']))
{
  $search=$_POST['txtsearch'];
  if ($search=='rating') {
    $select="SELECT *,AVG(r.ratingnumber) AS avgrating 
            FROM review r, lawyer l, sector s 
            WHERE s.sectorid=l.sectorid and r.lawyerid=l.lawyerid
            GROUP BY l.lawyerid, s.sectorid
            ORDER BY avgrating DESC";
     $run=mysqli_query($connect,$select);  
     $count=mysqli_num_rows($run);
  }
  else if($search=='lowfees')
  {
    $select="SELECT * FROM lawyer l, sector s
             WHERE s.sectorid=l.sectorid
             ORDER BY l.pricepersession";
    $run=mysqli_query($connect,$select);
    $count=mysqli_num_rows($run);
  }
  else if($search=='highfees')
  {
    $select="SELECT * FROM lawyer l, sector s
            WHERE s.sectorid=l.sectorid
            ORDER BY l.pricepersession DESC";
    $run=mysqli_query($connect,$select);
    $count=mysqli_num_rows($run);
  }
  else if($search=='popular')
  {
     $select="SELECT *,SUM(p.paymentfees) AS paymentfees 
            FROM lawyer l, payment p, appointment b, sector s
            WHERE l.lawyerid=b.lawyerid AND b.bookingid=p.bookingid and s.sectorid=l.sectorid
            GROUP BY l.lawyerid, s.sectorid
            ORDER BY paymentfees DESC";
     $run=mysqli_query($connect,$select);  
     $count=mysqli_num_rows($run);
  }
  for ($i=0; $i <$count ; $i++) { 
    $sectordata=mysqli_fetch_array($run);
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
                     
            
                     
                    echo    "<div class='clinic-details'>
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
                        <a class='view-pro-btn' href='lawyerprofiledisplay.php?id=$lawyerid'>View Profile</a>
                        <a class='apt-btn' href='bookingcalendar.php?id=$lawyerid'>Book Appointment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";  


  }
}
else
{
      $SELECT2="SELECT * FROM lawyer l, sector s
                WHERE s.sectorid=l.sectorid
                Order By lawyerid Desc";
      $ret=mysqli_query($connect,$SELECT2);
      $count2=mysqli_num_rows($ret);
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
                     
            
                     
                    echo    "<div class='clinic-details'>
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
                        <a class='view-pro-btn' href='lawyerprofiledisplay.php?id=$lawyerid'>View Profile</a>
                        <a class='apt-btn' href='bookingcalendar.php?id=$lawyerid'>Book Appointment</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";  

      }

}
    
    
   ?> 
            </div>
          </div>

        </div>

      </div>    
      <!-- /Page Content -->
   
      <!-- Footer -->
     <?php include('footer.php') ?>

      <!-- /Footer -->

    </div>
   <script src="assets/js/jquery.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    
    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    
    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
  </body>

<!-- doccure/search.html  30 Nov 2019 04:12:16 GMT -->
</html>