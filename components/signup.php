<?php 

if (isset($_SESSION['userPassword'])) {
  header('Location: ./');
} elseif(isset($_SESSION['adminPassword'])) {
  header('Location: ./');
}else{
    
}

?>
<div class="col-md-3 col-sm-6 mt-3 m-auto">
<form class="form-signup">
  <h1 class="h3 text-center mb-3 font-weight-normal">Sign up</h1>
  <div class="form-group">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus="" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <input type="text" id="inputPassword" class="form-control" placeholder="Password" required="">
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
  <button onclick="signup()" class="btn btn-primary btn-block mt-2" type="button">Sign Up</button>
   <div class="mt-3 text-center">
      <p>Have an account? <a href=".?page=login"> Login</a></p>
   </div>
</form>
</div>
<script>
  function signup(){
      var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var school = $('#school').val();
    var inp = email == '' || password == '' || school == '';
    //validation();
    checkInp(inp);
    if (!inp) {
        var obj = {signup:1,email:email, password:password,school:school};
        var url = 'controls/account.php';
        postData(obj,url);
    }
  }

function onsuccesssignup(){
    window.location = 'dashboard.php';
 }
</script>
