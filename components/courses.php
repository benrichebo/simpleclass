<section>
<p><a href="dashboard.php"><i class="fa fa-arrow-left"></i> Go back</a></p>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h5">Courses</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (isset($_SESSION['adminPassword'])) { ?>
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="createCourseToggle()"> <i class="fa fa-plus"></i> Create Course</button>
              </div>
            <?php } ?>
            </div>
          </div>
          <form class="my-2" id="courseForm">
              <div class="row">
                <div class="form-group col-md-3 col-sm-12">
                  <input type="text" id="courseName" class="form-control" placeholder="Course Name">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                    <input type="text" id="courseCode" class="form-control" placeholder="Course Code">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <select id="school" class="form-control mb-3">
                    <option value="">--Select School--</option>
                    <option value="KNUST">KNUST</option>
                    <option value="UG">UG</option>
                    <option value="UENR">UENR</option>
                    <option value="UMT">UMT</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <select id="year" class="form-control mb-3">
                    <option value="">--Select Year--</option>
                    <option value="Year 1">Year 1</option>
                    <option value="Year 2">Year 2</option>
                    <option value="Year 3">Year 3</option>
                    <option value="Year 4">Year 4</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                  <select id="semester" class="form-control mb-3">
                    <option value="">--Select Semester--</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                    <option value="Semester 3">Semester 3</option>
                  </select>
                </div>
                <?php if (isset($_SESSION['adminPassword'])) { ?>
                    <input type="text" id="adminPassword" class="form-control" value="<?php echo $_SESSION['adminPassword']; ?>" hidden>
                <?php } ?>
                <div class="col">
                  <button type="button" onclick="createCourse()" class="btn btn-primary">Create Course</button>
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
                  <th>YEAR</th>
                  <th>SEMESTER</th>
                  <?php if (isset($_SESSION['userPassword'])) { ?> 
                  <th>Register</th>
                  <?php } ?>
                </tr>
              </thead>
              <form action="">
              <tbody id="cour">
              </tbody>
              </form>
            </table>
          </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register for <span class="name"></span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            Are you sure want to register for this course with the code
            <span class="course"></span>
          </div>
          <div class="cresponse">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="regCourse(recipient)">Register</button>
      </div>
    </div>
  </div>
</div>

<script>
   (function(){
        $('#courseForm').hide(); 
         //fetch courses
      var obj = {fetchCourse: 'fetchCourse'};
      var url = './controls/data/courses.php';
      fetch(url,obj);
})()

function courses(response){
  var myObj = JSON.parse(response);
            var i = '', txt = '';
                for(i in myObj){
                    txt += '<tr>';
                    txt += '<td>#</td>';
                    txt += '<td>' + myObj[i].course_name + '</td>';
                    txt += '<td>' + myObj[i].course_code + '</td>';
                    txt += '<td>' + myObj[i].year + '</td>';
                    txt += '<td>' + myObj[i].semester + '</td>';
                   <?php if (isset($_SESSION['userPassword'])) { ?> 
                    txt += '<td><button type="button" class="btn btn-primary" data-toggle="modal"'; 
                    txt += ' data-target="#exampleModal" data-whatever="' + myObj[i].course_code + '" data-name="' + myObj[i].course_name + '">register</button></td>';
                   <?php } ?>
                    txt += '</tr>';
                }
                $('#cour').html(txt);
}

function createCourse(){
          var courseName = $('#courseName').val();
          var courseCode = $('#courseCode').val();
          var password = $('#adminPassword').val();
          var school = $('#school').val();
          var year = $('#year').val();
          var semester = $('#semester').val();
          var inp = courseName == '' || courseCode == '' || password == '' || school == '' || year == '' || semester == '';
          checkInp(inp);
          if (!inp) {
              var obj = {createCourse:1,courseName:courseName, courseCode:courseCode, password:password, school:school, year:year, semester:semester};
              //alert(obj);
              var url = 'controls/course.php';
              postData(obj,url);
          }
}

      //course form
     
function createCourseToggle(){
        $('#courseForm').toggle();
}

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  recipient = button.data('whatever') // Extract info from data-* attributes
  
  var name = button.data('name') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.name').text(name)
  modal.find('.course').text(recipient)
});

function onsccesscoursereg() {
  $('.cresponse').html('course was created');
}

function regCourse(recipient) {
  var courseCode = recipient;
              var obj = {regCourse:'regCourse',courseCode:courseCode};
              //alert(obj);
              var url = 'controls/course.php';
              postData(obj,url);
  
}
</script>
