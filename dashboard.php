<?php 

session_start();
require_once('controls/initialize.php');
include_once('header.php'); ?>
      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 text-white">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">SimpleClass</a>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" id="logout" href="#"> <span class="mr-4">
              <?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) {
                echo $_SESSION['userEmail'];
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
                  <a class="nav-link active" href="dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <?php if (isset($_SESSION['userPassword'])) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    Materials
                  </a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=lecturers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    Lecturers
                  </a>
                </li>
                <?php }elseif (isset($_SESSION['adminPassword'])) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=lecturers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    Lecturers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=courses">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                    Courses
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=classes">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                      Classes
                    </a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=students">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Students
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    Materials
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
  