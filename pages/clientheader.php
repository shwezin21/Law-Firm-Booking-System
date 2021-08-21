   <?php include('clientdata.php') ?>
      <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
          <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
              <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </a>
            <a href="home.php" class="navbar-brand logo">
              Justice For You
            </a>
          </div>
          <div class="main-menu-wrapper">
            <div class="menu-header">
              <a href="home.php" class="menu-logo">
                  Justice For You
              </a>
              <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i>
              </a>
            </div>
            <ul class="main-nav">
              <li class="active">
                <a href="home.php">Home</a>
              </li>
              <li class="has-submenu">
                <a href="lawyerdisplay.php">Lawyer</a>
              </li> 
              <li class="has-submenu">
                <a href="contactus.php">Contact Us</a>
              </li> 
              <li class="login-link">
                <a href="signin.php">Login / Signup</a>
              </li>
            </ul>    
          </div>     
          <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
              <div class="header-contact-img">
                <i class="far fa-hospital"></i>             
              </div>
              <div class="header-contact-detail">
                <p class="contact-header">Contact</p>
                <p class="contact-info-header"> +09422715702</p>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link header-login" href="signin.php">login / Signup </a>
            </li>

<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="<?php echo $adavatar ?>" width="31" alt="<?php echo $adname ?>">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="<?php echo $adavatar?>" alt="<?php echo $adname ?>" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?php echo $adname ?></h6>
										<p class="text-muted mb-0">Clients</p>
									</div>
								</div>
								<a class="dropdown-item" href="clientchangepassword.php">Change Password</a>
								<a class="dropdown-item" href="clientprofile.php">Profile Settings</a>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>

          </ul>
        </nav>
      </header>
      <script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>