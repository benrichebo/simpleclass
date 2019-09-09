<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <?php if (isset($_SESSION['adminPassword'])) { ?>
                  <div class="btn-group mr-2">
                    <a href="dashboard.php?page=materials" type="button" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-plus"></i> Upload Course material</a>
                  </div>
                <?php } ?>
                </div>
              </div>
<div class="jumbotron">
                <h4 class="display-7">Welcome to simpleclass</h4>
                <p class="lead">You can get started with this quick actions.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <ul class="list-unstyled list-inline">
                <?php if (isset($_SESSION['adminPassword']) === '95bfyots') { ?>
                  <li><a class="btn" href="dashboard?page=classes" role="button"> <i class="fa fa-plus"></i> Create Class</a></li>
                  <li><a class="btn" href="dashboard?page=courses" role="button"> <i class="fa fa-plus"></i> Create Course</a></li>
                <?php } elseif (isset($_SESSION['adminPassword'])) { ?>
                  <li><a class="btn" href="dashboard?page=materials" role="button"> <i class="fa fa-plus"></i> Upload Material</a></li>
                  <?php } elseif (isset($_SESSION['userPassword'])) { ?>
                    <li><a class="btn btn-primary" href="dashboard.php?page=materials" role="button"> <i class="fa fa-plus"></i> Materials</a></li>  
                  <?php }
                   ?>
                </ul>
              </div>