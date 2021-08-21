<?php  
session_start();
include('function.php');
$connect=mysqli_connect("localhost","root","","justiceforyoudb");
if(isset($_GET['bookingid']))
{


	$date=date('Y-m-d');
$bookingid=$_GET['bookingid'];
$select="SELECT * FROM appointment b, lawyer l, client c,
         availableslot avs
         WHERE b.bookingid='$bookingid' and b.lawyerid=l.lawyerid and c.clientid=b.clientid and avs.slotid=b.slotid";
$run=mysqli_query($connect,$select);
$row=mysqli_fetch_array($run);
$pricepersession=$row['pricepersession'];
$bookingid=$row['bookingid'];
$slotstart=$row['slotstart'];
$slotend=$row['slotend'];
$appointmentdate=$row['appointmentdate'];
$lname=$row['lname'];
$lavatar=$row['lavatar'];
$laddress=$row['laddress'];
$lname=$row['lname'];
$lawyerid=$row['lawyerid'];
$cname=$row['clname'];
$cage=$row['cage'];
$cemail=$row['cemail'];
$cphoneno=$row['cphoneno'];
$paymentid=AutoID('payment','paymentid','pay_',6);
$SELECT="SELECT  CAST(AVG(r.ratingnumber) AS DECIMAL(10,0)) As avgrating
                   FROM  review r, lawyer l
                WHERE l.lawyerid='$lawyerid' and l.lawyerid=r.lawyerid";
  $selectquery=mysqli_query($connect,$SELECT);
  $selectrow=mysqli_fetch_array($selectquery);
  $avgrating=$selectrow['avgrating'];
if (isset($_POST['btnCheckout'])) {
$PaymentType=$_POST['rdopayment']; 
if ($PaymentType=='WaveMoney') {
        
        $Creditcard=null;
        $Creditcardno=null;
        $phnum=$_POST['txtphnum'];
        $Password=$_POST['txtPassword'];
        $expiry_month=null;
        $expiry_year=null;
        $cvv=null;
    }
    elseif ($PaymentType=='CreditCard') {
        # code...
        $phnum=null;
        $Password=null;
        $Creditcard=$_POST['txtcardname'];
        $Creditcardno=$_POST['txtCardNum'];
        $expiry_month=$_POST['txtexpirymonth'];
        $expiry_year=$_POST['txtexpiryyear'];
        $cvv=$_POST['txtcv'];
    }
    else
    {

    }
$insert="INSERT INTO `payment`(`paymentid`, `paymentfees`, `bookingid`, `creditcardnumber`, `creditcardpassword`, `wavemoneyphnumber`, `wavemoneypassword`, `paymentdate`, `expirymonth`, `expiryyear`, `cvv`) VALUES('$paymentid','$pricepersession','$bookingid','$Creditcard','$Creditcardno','$phnum','$Password','$date','$expiry_month','$expiry_year','$cvv')";
  $run2=mysqli_query($connect,$insert);
  if($run2)
  {
     echo "<script>
        window.location.assign('bookingsuccess.php?paymentid=$paymentid')
        </script>";
  }
}
}

?>

<!DOCTYPE html> 
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Justice For You</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		
	</head>
	<body>
		<div class="main-wrapper">
		<?php include('header.php') ?>
					<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
									<form method="POST" enctype='multipart/form-data'>
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Name</label>
														<input class="form-control" type="text" value="<?php echo $cname ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Age</label>
														<input class="form-control" type="text" value="<?php echo $cage ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email" value="<?php echo $cemail ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input class="form-control" type="text" value="<?php echo $cphoneno ?>">
													</div>
												</div>
											</div>
											
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												
													<input type='radio' name='rdopayment' value='CreditCard' id='rd2'>
													<span class="checkmark"></span>
													Credit card
													<input type='radio' name='rdopayment' value='WaveMoney' id='rd3'>
													<span class="checkmark"></span>
													Wave Money
												
						                       
												<div class="row Creditcard">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" name='txtcardname' type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" name='txtCardNum' placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" name='txtexpirymonth' placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text" name='txtexpiryyear'>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" name='txtcv' type="text">
														</div>
													</div>
												</div>
										
											<div class="row wavemoney">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="number">Phone No</label>
															 <input type="text" name="txtphnum" pattern="09[0-9]{9}" class="form-control" id="number">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="password">Password</label>
															<input type="text" name="txtPassword"  class="form-control" type="text" id='password'>
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept" required>
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn" name='btnCheckout'>Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="<?php echo $lavatar ?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html"><?php echo $lname ?></a></h4>
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
											 ?>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i><?php echo $laddress ?></p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date <span><?php echo $appointmentdate ?></span></li>
												<li>Time <span><?php echo $slotstart?>-<?php echo $slotend?></span></li>
											</ul>
											<ul class="booking-fee">
												
												<li>Appointment Fee <span>$<?php echo $pricepersession  ?></span></li>
												
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">$<?php echo $pricepersession ?></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<?php include('footer.php') ?>
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(
    function()
    {
        $(".Creditcard").hide();
        $(".wavemoney").hide();

        $("#rd2").click(
            function()
            {
                $(".Creditcard").show();
                $(".wavemoney").hide();
            }
            );

        $("#rd3").click(
            function()
            {
                $(".Creditcard").hide();
                $(".wavemoney").show();
            }
            );
}
);
    </script>
		
	</body>

<!-- doccure/checkout.html  30 Nov 2019 04:12:16 GMT -->
</html>