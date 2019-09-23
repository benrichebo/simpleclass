<div class="col-md-12 col-sm-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <?php if (isset($_SESSION['adminPassword'])) { ?>
                  <div class="btn-group mr-2">

                    <a href="dashboard.php?page=materials" href="#" class="btn btn-sm btn-outline-secondary"> <i class="fa fa-plus"></i> Upload Course material</a>
                  </div>
                <?php } ?>
                </div>
</div>
<div class="jumbotron">
                <h4 class="display-7">Welcome to simpleclass</h4>
                <p class="lead">You can get started with this quick actions.</p>
                <div class="col-md-12 col-sm-12 p-0">
                    <?php if (isset($_SESSION['adminPassword'])) { ?>
                      <a class="btn btn-primary m-1" href="dashboard?page=courses" role="button"> <i class="fa fa-plus"></i> Create Course</a>
                      <a class="btn btn-primary m-1" href="dashboard.php?page=materials" role="button"> Materials</a>
                    <?php } elseif (isset($_SESSION['userPassword']) || isset($_SESSION['adminPassword'])) { ?>
                      <a class="btn btn-primary" href="dashboard.php?page=materials" role="button"> Materials</a>
                    <?php }?>
                    <?php if (isset($_SESSION['userPassword'])) { ?>
                    <a class="btn btn-primary" href="dashboard.php?page=courses" role="button"> Register for a course</a>
                    <?php }?>
                </div>
</div>

