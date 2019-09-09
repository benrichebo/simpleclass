<section>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h5">Courses</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == '95bfyots' ) { ?>
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="createCourseToggle"> <i class="fa fa-plus"></i> Create Course</button>
              </div>
            <?php } ?>
            </div>
          </div>
          <form class="m-5" id="courseForm">
              <div class="row">
                <div class="col">
                  <input type="text" id="courseName" class="form-control" placeholder="Course Name">
                </div>
                <div class="col">
                    <input type="text" id="courseCode" class="form-control" placeholder="Course Code">
                </div>
                <div class="col">
                    <select name="" id="selectLecturers" class="form-control">
                    </select>
                </div>
                <div class="col">
                  <button type="button" id="createCourse" class="btn btn-primary">Create Course</button>
                </div>
              </div>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>COURSE NAME</th>
                  <th>COURSE CODE</th>
                  <th>LECTURER</th>
                </tr>
              </thead>
              <tbody id="cour">
              </tbody>
            </table>
          </div>
    </section>
