<div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content p-3">
     <span id="response">Processing...</span>
    </div>
  </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.bundle.min.js"></script>
<script>
 /*  $('.page').click(function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    $('#content').load(link);
  }) */

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
