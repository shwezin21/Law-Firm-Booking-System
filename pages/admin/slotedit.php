<?php include('admindata.php') ?>
<?php include('../function.php') ?>
<?php
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $select= "SELECT * FROM availableslot where slotid = '$id'";
  $run = mysqli_query($connect,$select);
  $row = mysqli_fetch_array($run);
  $slotstart = $row['slotstart'];
  $slotend = $row['slotend'];
}
if(isset($_POST['btnupdate']))
{
  $slotid = $_POST['txtid'];
    $slotstart = $_POST['txtslotstart'];
     $slotend = $_POST['txtslotend'];
  $update = "Update availableslot Set 
  slotstart = '$slotstart',  
 slotend = '$slotend'
  where slotid = '$slotid' ";
  $run= mysqli_query($connect,$update);
  if ($run)
  {
    echo "<script>alert ('Update successfully');
    window.location.assign('timeslot.php');
   </script>";
  }
  else
  {
    mysqli_error($connect);
  }
}
  
 ?>
 <html>
 <head>

   <title>Justice For You -Slot Edit</title>
    
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
    
    <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    </head>

 <body>

<?php include('adminheader.php') ?>
  <div class="sidebar" id="sidebar" style='background-color: #1b5a90;'>
                <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="menu-title"> 
                <span>Main</span>
              </li>
              <li> 
                <a href="admindashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
              </li>
              <li> 
                <a href="appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
              </li>
              <li> 
                <a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
              </li>
              <li> 
                <a href="lawyermanage.php"><i class="fe fe-user-plus"></i> <span>Lawyer</span></a>
              </li>
              <li> 
                <a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
              </li>
              <li class="active"> 
                   <a href="timeslot.php"><img src='assets/img/icon-03.png' width='20px'>Time Slot</a>
                </li>
              <li> 
                <a href="reviewdisplay.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
              </li>
              <li> 
                <a href="paymentlist.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
              </li>
              <li> 
                <a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
              </li>
    
              
          </div>
                </div>
            </div>
      
      <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
          <div class="page-header">
   <form action="slotedit.php" method="POST" enctype = "multipart/form-data">
    <div class='form-group'>
    <input class='seditid' type="text" name="txtid" value = "<?php echo $_GET['id'] ?>" hidden> <br><br>
    </div>

    <div class='form form-row'>
    <div class="col-12 col-md-6">
    <div class='form-group'>
    <label>Slot Start </label> 
    <input  type="text" name="txtslotstart" value = "<?php echo $slotstart?>"required="" class='form-control'>
    </div>
  </div>
  <div class="col-12 col-md-6">
     <label>Slot End</label>
     <div class='form-group'>
    <input   type="text" name="txtslotend" value = "<?php echo $slotend?>"required="" class='form-control'>
  </div>
  
</div>
    <input type="submit" name="btnupdate" value="Update" class='btn btn-xs btn-primary'>
  </form>
            </div>
          </div>
          </div>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
    
    <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- Custom JS -->
    <script  src="assets/js/script.js"></script>
    
 </body>
 </html>
 