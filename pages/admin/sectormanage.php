<?php include('admindata.php') ?>
<?php include('../function.php') ?>
<?php
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if(isset($_GET['id']))
{
    $lawyerid=$_GET['id'];
  $select="SELECT * FROM lawyer
          WHERE lawyerid='$lawyerid'";
  $run = mysqli_query($connect,$select);
  $row = mysqli_fetch_array($run);
  $lname = $row['lname'];
  $lavatar = $row['lavatar'];
}

if(isset($_POST['btnupdate']))
{
  $lawyerid = $_POST['txtid'];
    $sectorid = $_POST['sectorname'];
  $update = "Update lawyer Set sectorid = '$sectorid '
  where lawyerid = '$lawyerid' ";
  $run= mysqli_query($connect,$update);
  if ($run)
  {
  	echo "<script>alert ('Update successfully')
          window.location.assign('lawyermanage.php')
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

   <title>Justice For You - Sector Manage</title>
    
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

<?php include('adminheader.php') ?>
 <body>
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
              <li class="active"> 
                <a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
              </li>
              <li> 
                <a href="lawyermanage.php"><i class="fe fe-user-plus"></i> <span>Lawyer</span></a>
              </li>
              <li> 
                <a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
              </li>
              <li> 
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
   <div class="main-wrapper">
      
      <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
          <div class="page-header">
  <form action='sectormanage.php' method='POST' enctype="multipart/form-data">
    <legend>Sector Manage</legend>
    <div class="col-auto profile-image">
                    <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="<?php echo $lavatar ?>" alt="<?php echo $lname ?>" width='90px'>
                                    <label><?php echo $lname ?></label>
                                </figure>

                  </div>
                <div class="row form-row">
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label>Lawyerid</label>
                      <input class='seditid' type="text" name="txtid" value = "<?php echo $_GET['id'] ?>" class='form-control' readonly = ""> 
                    </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label>Sector Name</label>
                      <select name="sectorname" class="form-control" required>
       <optgroup label='Choose Sector Name'>
        <?php 
          $select="Select * FROM sector";
          $run=mysqli_query($connect,$select);
          $count=mysqli_num_rows($run);
          for ($i=0; $i < $count ; $i++) { 
            $row=mysqli_fetch_array($run);
            $sectorname=$row['sectorname'];
            $sectorid=$row['sectorid'];
            echo"<option value='$sectorid'>$sectorname</option>";
          }
                  ?>

                    </div>
                  </div>
                  
                </div>
                <input type="submit" name="btnupdate" class="btn btn-xs btn-primary" value="Save Changes">
              </form>
            </div>
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
 