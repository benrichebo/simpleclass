<?php 
if (isset($_SESSION['userPassword'])) {
  header('Location: ./');
} elseif(isset($_SESSION['adminPassword'])) {
  header('Location: ./');
}else{
    
}
require_once('controls/initialize.php');
include_once('header.php'); ?>
      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 text-white">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">SimpleClass</a>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" onclick="logout()" href=""> <span class="mr-4">
              <?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) {
                //echo $_SESSION['userEmail'];
              } ?>
            </span> Sign out</a>
          </li>
        </ul>
      </nav>
      
  <div class="container-fluid mt-5">
    <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="dashboard.php"> <i class="fa fa-dashboard"></i> Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <?php if (isset($_SESSION['userPassword'])) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials"><i class="fa fa-file"></i>  Materials
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=courses"><i class="fa fa-list"></i> Courses
                  </a>
                </li>
                <?php }elseif (isset($_SESSION['adminPassword'])) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=courses"><i class="fa fa-list"></i> Courses
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=students"> <i class="fa fa-users"></i> Students
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials"><i class="fa fa-file"></i> Materials
                  </a>
                </li> 
                
                <?php } ?> 
              </ul>
            </div>
          </nav>
      
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
              <?php
             get_page_dashboard();
              ?>
      </main>
    </div>
  </div>
  <?php include_once('footer.php') ?>
  