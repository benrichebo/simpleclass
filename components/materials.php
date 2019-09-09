<?php 

require_once('controls/upload.php'); 
?>
<section>
<p><a href="dashboard.php"><i class="fa fa-arrow-left"></i> Go back</a></p>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
            <h1 class="h5">Materials</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (isset($_SESSION['adminPassword'])) { ?>
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="uploadMaterialToggle"> <i class="fa fa-plus"></i> Upload new</button>
              </div>
            <?php } ?>
            </div>
          </div> <?php //if (isset($_SESSION['mssg'])) {
            echo $msg;
            echo $msg2;
            echo $msg3;
            echo $msg4;
            echo $msg5;
            echo $msg6;
          //} ?>
          <form class="m-3" id="uploadForm" method="post" enctype="multipart/form-data">
         
                  <div class="row">
                    <span class="col">
                        <select name="selectCourses" id="selectCourses" class="form-control">
                        </select>
                    </span>
                    <span class="col">
                        <select name="selectClasses" id="selectClasses"  class="form-control">
                        </select>
                    </span>
                  </div>
                <input type="text" value="<?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) {
                echo $msg = $_SESSION['userEmail'];
              } ?>" name="lecturer" hidden>
                
              <div class="form-group mt-3">
                <label for="material">File input</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Upload</button>
            </form>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>MATERIAL</th>
                  <th>COURSE</th>
                </tr>
              </thead>
              <tbody id="materialsTable">
              </tbody>
            </table>
          </div>
    </section>