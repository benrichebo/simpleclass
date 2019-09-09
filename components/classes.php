<section>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h5">Classes</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (isset($_SESSION['adminPassword']) && $_SESSION['adminPassword'] == '95bfyots' ) { ?>
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="classFormToggle"> <i class="fa fa-plus"></i> Create Class</button>
              </div>
            <?php } ?>
            </div>
          </div>
          <form class="m-5" id="classForm">
              <div class="row">
                <div class="col">
                  <input type="text" id="className" class="form-control" placeholder="Class name">
                </div>
                <div class="col">
                  <button type="button" id="createClass" class="btn btn-primary">Create Class</button>
                </div>
              </div>
          </form>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>CLASS NAME</th>
                  <th>NO. OF STUDENTS</th>
                </tr>
              </thead>
              <tbody id="classesTable">
                
              </tbody>
            </table>
          </div>
    </section>
    <script>
        //class form
  $('#classForm').hide();
$('#createClassToggle').click(function(){
    $('#classForm').toggle();
})

$('#createClass').click(function(){
  var className = $('#className').val();
  alert(className);
})
    </script>