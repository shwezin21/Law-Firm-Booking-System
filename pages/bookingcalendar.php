<?php include('header.php')?>
<?php
$connect=mysqli_connect("localhost","root","","justiceforyoudb");
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} 
else {
    $ym = date('Y-m');
}
$lawyerid=$_GET['id'];
$select="SELECT * FROM lawyer l 
         WHERE l.lawyerid='$lawyerid'";
$run=mysqli_query($connect,$select);
$row=mysqli_fetch_array($run);
  $lname=$row['lname'];
 $lavatar=$row['lavatar'];
$position=$row['lposition'];
$pricepersession=$row['pricepersession'];
$education=$row['leducation'];
$lawyerid=$row['lawyerid'];
$laddress=$row['laddress'];
$SELECT="SELECT CAST(AVG(r.ratingnumber) AS DECIMAL(10,0)) As avgrating
          FROM  review r, lawyer l
           WHERE l.lawyerid='$lawyerid' and l.lawyerid=r.lawyerid";
         $selectquery=mysqli_query($connect,$SELECT);
         $selectrow=mysqli_fetch_array($selectquery);
         $avgrating=$selectrow['avgrating'];
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
$datetoday=strtotime(date('Y-m-d'));
$html_title = date('M, Y', $timestamp);
$current = date('D-m-y');
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
$day_count = date('t', $timestamp);
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
$weeks = array();
$week = '';
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
      $date=strtotime("$ym-$day");
      $datename=("$ym-$day");
      $dayname=date('D', strtotime($datename));
      $today="$ym-$day";
       $select1="SELECT * FROM availableslot avs, lawyer l, appointment b
         WHERE avs.slotid = b.slotid and l.lawyerid=b.lawyerid and avs.slotid IS NOT NULL and l.lawyerid='$lawyerid' and b.appointmentdate='$today'";
$run1=mysqli_query($connect,$select1);
$row =mysqli_num_rows($run1);
$select2="SELECT * FROM availableslot";
$run2=mysqli_query($connect,$select2);
$count=mysqli_num_rows($run2);
if($row>=$count and $date>$datetoday)
{
   $week .= "<td> <h4>$day</h4> <button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#myModal1'> Booked</button>
    <div class='modal fade' id='myModal1' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
                  <h4 class='modal-title'>! Sorry</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>

        </div>
        <div class='modal-body'>
          <p>This date is already booked.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  
</div>
</td>";

}
 else if($datetoday == $date) {
        $week .= "<td class='today'> <h4>$day</h4> <button class='btn btn-xs btn-warning' data-toggle='modal' data-target='#myModal'>N/a</button></td>";
     }
     else if($dayname=='Sun')
     {
        $week .= "<td class='today'> <h4>$day</h4> <button class='btn btn-xs btn-warning' data-toggle='modal' data-target='#myModal2'>Closed</button>
         <div class='modal fade' id='myModal2' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
                  <h4 class='modal-title'>! Sorry</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>

        </div>
        <div class='modal-body'>
          <p>Sorry! Justice for you is off.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  
</div></td>";
     }
    
else if($datetoday>=$date)
     {
       
          $week .="<td><h4>$day</h4>
          <button class='btn btn-xs btn-warning' data-toggle='modal' data-target='#myModal'>N/a</button>
            <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
                  <h4 class='modal-title'>! Sorry</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>

        </div>
        <div class='modal-body'>
          <p>This date is unavailable.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  
</div>
</button></td>";
 

     }

else {
        $week .= "<td><h4>$day</h4><a href='booking.php?date=$today&lawyerid=$lawyerid' class='btn btn-xs btn-primary'>Booking</a>";

        }
    $week .= '</td>';
    if ($str % 7 == 6 || $day == $day_count) {
  if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }

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
     <style>

        .container1 {
            font-family: 'Noto Sans', sans-serif;
            position: relative;
           
        }
        table
        {
         
             border-collapse: collapse;
           border-spacing: 0;
           width: 100%;
           border: 1px solid #ddd;
           background-color:#fff;
           margin-top: 5px;
        }
        h3 {
            margin-bottom: 20px;
        }
        th,td{
            text-align: center;
            color:black;
           padding:10px;
           border-color:rgba(0,0,0,0.001);

        }
        th
        {
          border-bottom-color: rgba(0,0,0,0.2);

        }
        
        td h4
        {
          color:black;
         
        }
        .today {
            background-color:rgba(0,0,0,0.3);
        }
        center
        {
          margin-bottom: 30px;
        }
    </style>
  

    
</head>
<body>
  <div class='card'>
                <div class='card-body'>
                  <div class='booking-doc-info'>
                    <a href='doctor-profile.html' class='booking-doc-img'>
                      <img src='<?php echo $lavatar  ?>' alt='<?php echo $lname ?>'>
                    </a>
                    <div class='booking-info'>
                      <h4><a href='doctor-profile.html'><?php echo $lname ?></a></h4>
                      <?php  
                      if($avgrating>=1 and $avgrating<2)
                                    {
                                    echo "<div class='review-count rating'>
                                    <i class='fas fa-star filled'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                     <span class='d-inline-block average-rating'>$avgrating</span>
                                  </div>";
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
                                    echo" <div class='review-count rating'>
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
                                      echo" <div class='review-count rating'>
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
                                ?>
                     
                   <p class='text-muted mb-0'><i class='fas fa-map-marker-alt'></i><?php echo $laddress ?></p>
                    </div>
                  </div>
                </div>
              </div>
               <div style="overflow-x:auto;">
   <center>
        <h1><?php echo $html_title; ?> </h1>
        <a class="btn btn-primary btn-xs" href="?ym=<?php echo $current; ?>& id=<?php echo $lawyerid; ?>">Current Month</a>  
        <a class="btn btn-primary btn-xs" href="?ym=<?php echo $next; ?>& id=<?php echo $lawyerid; ?>">Next Month</a><br>
        <table border='1' style="width:450px">
            <tr>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
  </center>
</div>

              <!-- /Schedule Widget -->
              <!-- /Schedule Widget -->
              
    <script src="assets/js/jquery.min.js"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
  </body>
   <?php include('footer.php') ?> 
<!-- doccure/doctor-profile.html  30 Nov 2019 04:12:16 GMT -->
</html>