<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
<script>
 /*  $('.page').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    $('#content').load(link);
  }) */


//lecturer form
$('#lecturerForm').hide();
$('#createLecturerToggle').click(function(){
    $('#lecturerForm').toggle();
})

$('#addLecturer').click(function(){
  var lecturereName = $('#lecturerName').val();
  var department = $('#department').val();
  alert(department);
})


//course form
$('#courseForm').hide();
$('#createCourseToggle').click(function(){
    $('#courseForm').toggle();
})



//upload file form
$('#uploadForm').hide();
$('#uploadMaterialToggle').click(function(){
    $('#uploadForm').toggle();
})

$('#uploadMaterial').click(function(){
  var material = $('#material').val();
  alert(material);
})

//upload file form
$('#classForm').hide();
$('#classFormToggle').click(function(){
    $('#classForm').toggle();
})

</script>
</body>
</html>
