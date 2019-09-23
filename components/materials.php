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
                      Select Course
                        <select name="course" id="selectCourses" class="form-control">
                        </select>
                    </span>
                    <span class="col">
                      Select school
                        <select name="school" id="selectSchool" class="form-control">
                        </select>
                    </span>
                  </div>
                <input type="text" value="<?php if (isset($_SESSION['adminPassword'])) {
                echo $msg = $_SESSION['userEmail'];
              } ?>" name="lecturer" hidden>
                
              <div class="form-group mt-3">
                <label for="material">File input</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Upload</button>
            </form>
            <div class="row" id="materialsTable">
            </div>
    </section>
    <script>
(function(){
  $('#courseForm').hide(); 
     url = './controls/data/courses.php';
      //fetch school
      var obj = {fetchCourseSchool: 'fetchCourseSchool'};
      fetch(url,obj);
  //fetch courses
      var obj = {fetchCourse: 'fetchCourse'};
      fetch(url,obj);

      //fetch materials
      var obj = {fetchMaterials: 'fetchMaterials'};
      var url = 'controls/data/materials.php';
      fetch(url,obj);

})()
      

function fetchC(response){
    var myObj = JSON.parse(response);
            var i = '', txt = '';
                for(i in myObj){
                  txt += '<option value="' + myObj[i].course_code + '">' + myObj[i].course_code + '</option>';
                }
                $('#selectCourses').html(txt);
}


function fetchS(response){
    var myObj = JSON.parse(response);
            var i = '', txt = '';
                for(i in myObj){
                  txt += '<option value="' + myObj[i].school + '">' + myObj[i].school + '</option>';
                }
                $('#selectSchool').html(txt);
}


function onsuccessmaterial(response){
        var myObj = JSON.parse(response);
    var i = '', txt = '';
    for(i in myObj){
        txt += '<div class="col-md-2 col-sm-3">'
        txt += '<div class="card">';
        txt += '<div class="card-body text-center">'
        txt += '<img src="./images/pdf.png" width="50" alt="">';   
        txt += '</div>'
        txt += '<div class="card-footer p-2">'
        txt += '<small>' + myObj[i].material_name + '</small> <a href="uploads/'+ myObj[i].material_name +'" download class="fa fa-download"></a>';
        txt += '</div>';
        txt += '</div>';
        txt += '</div>';
    }
    $('#materialsTable').html(txt);
}
    </script>