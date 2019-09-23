<div class="col-md-3 col-sm-6 m-auto">
<form class="form-signup">
  <h3 class="h3-responsive text-center mb-3 font-weight-normal">Lecturers Sign up</h3>
  <div class="form-group">
    <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>
  </div>
  <div class="form-group">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  </div>
  <div class="form-group">
  <input type="text" id="inputPassword" class="form-control" placeholder="Password" required>
  </div>
  <div class="form-group">
    <select id="school" class="form-control mb-3">
      <option value="">--Select School--</option>
      <option value="KNUST">KNUST</option>
      <option value="UG">UG</option>
      <option value="UENR">UENR</option>
      <option value="UMT">UMT</option>
    </select>
  </div>
  <button onclick="signupAdmin()" class="btn btn-primary btn-block mt-2" type="button">Sign Up</button>
   <div class="mt-3 text-center">
    <p>Have an account? <a href=".?page=login"> Login</a></p>
   </div>
</form>
</div>
<script>
  function signupAdmin(){
    var lecname = $('#inputName').val();
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var school = $('#school').val();
    var inp = lecname == '' || email == '' || password == '' || school == '';
    checkInp(inp);
    if (!inp) {
        var obj = {signupAdmin:1,lecname:lecname, email:email, password:password, school:school};
        var url = 'controls/account.php';
        postData(obj,url);
    }
  }

function onsuccessadminsignup(){
    window.location = 'dashboard.php';
 }
</script>
