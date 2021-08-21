<?php 
include('function.php');
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb'); 
if (!isset($_SESSION['clientemail']))
{
  echo "<script>alert('Please Login');
          window.location.assign('signin.php');
    </script>"; 
}
else
{
	$email=$_SESSION['clientemail'];
	$select="SELECT * FROM client
	         WHERE cemail='$email'";
	$run=mysqli_query($connect,$select);
	$row=mysqli_fetch_array($run);
	$clientid=$row['clientid'];
}
  if(isset($_POST['btnbook']))
  {
    $lawyerid=$_POST['txtlawyerid'];
    $clientid=$_POST['txtclientid'];
    $date=$_POST['txtdate'];
   $description=$_POST['txtdescription'];
   $timeslotid=$_POST['cbotimeslot'];
   $bookingdate=date('Y-m-d');
   $bookingid=AutoID('appointment','bookingid','book_',6);
   $slquery="SELECT * FROM  appointment
            WHERE appointmentdate='$date' and slotid='$timeslotid' and lawyerid='$lawyerid'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
if($row>0)
   {
    echo "<script>alert('Booking already exists.Please choose another booking session')
    window.location.assign('booking.php?lawyerid=$lawyerid&date=$date')</script>";
     } 
else
  {
    $insert="INSERT INTO `appointment`
            (`bookingid`,`lawyerid`, `clientid`, `appointmentdate`,`status` ,`slotid`, `casedescription`, `bookingdate`) 
      VALUES('$bookingid','$lawyerid','$clientid','$date','Pending','$timeslotid','$description','$bookingdate')";
    $run=mysqli_query($connect,$insert);
    if ($run) {
      echo "<script>
         alert ('Successfully Book');
          window.location.assign('checkout.php?bookingid=$bookingid');
         </script>";

    }
    else
    {
      echo mysqli_error($connect);
    }
  }
  }

 ?>
<html>
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
<body>
<div class="container">
  <h2>Booking form</h2>
  <form class="form-horizontal" action="booking.php" method='POST'>
  	<input type='text' name='txtlawyerid' value='<?php echo $_GET['lawyerid'] ?>' hidden>
  	<input type='text' name='txtdate' value='<?php echo $_GET['date'] ?>' hidden>
  	<input type='text' name='txtclientid' value='<?php echo $clientid ?>' hidden>
    <div class="form-group">
      <label class="control-label col-sm-2" for="bookingsection">Booking Section:</label>
      <div class="col-sm-10">
      	<select name="cbotimeslot" id="bookingsection" class="form-control">
       <optgroup label='Choose Time Slot'>
       <?php 
          $select="Select * FROM availableslot ";
          $run=mysqli_query($connect,$select);
          $count=mysqli_num_rows($run);
          for ($i=0; $i < $count ; $i++) { 
            $row=mysqli_fetch_array($run);
            $slotstart=$row['slotstart'];
            $slotend=$row['slotend'];
            $slotid=$row['slotid'];
            echo"<option value='$slotid'>$slotstart To $slotend</option>";
          }
        ?>
        </optgroup>
      </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="comment">Case Description:</label>
      <div class="col-sm-10">          
      <textarea placeholder="Enter your case description" id="comment" rows="5" class="form-control" name="txtdescription"  required></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name='btnbook' value='book' class="btn btn-primary btn-lg">
      </div>
    </div>
  </form>
</div>
  <?php include('footer.php') ?>          
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
