<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./">SimpleClass</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    <?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) { ?>
        <li class="nav-item">
          <a class="btn btn-outline btn-primary" href="dashboard.php">Dashboard</a>
        </li>
    <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="./?page=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?page=signup">Sign Up</a>
          </li>
          <li class="nav-item">
              <a class="btn btn-outline btn-primary" href="./?page=admin_signup">Register as a lecturer</a>
          </li>
      <?php } ?>
      
    </ul>
  </div>
</nav>