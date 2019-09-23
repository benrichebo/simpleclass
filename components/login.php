<?php 
if (isset($_SESSION['userPassword'])) {
  header('Location: ./');
} elseif(isset($_SESSION['adminPassword'])) {
  header('Location: ./');
}else{
    
}

?>
<div class="col-md-3 col-sm-6 m-auto">
    <form class="form-signin">
      <img class="mb-4" src="." alt="" width="72" height="72">
      <h3 class="h3-responsive text-center mb-3 font-weight-normal">Please sign in</h3>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>  
      </div>
      <button onclick="login()" class="btn btn-primary btn-block" type="button">Sign in</button>
      <div class="mt-3 text-center">
          <p>New user? <a href=".?page=signup"> Sign up</a></p>
      </div>
    </form>
</div>
<script>
  function login(){
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var inp = email == '' || password == '';
    checkInp(inp);
    if (!inp) {
        var obj = {login:1,email:email, password:password};
        var url = 'controls/account.php';
        postData(obj,url);
    }
  }

function onsuccesslogin(){
    window.location = 'dashboard.php';
 }

 
 function onsuccessadminlogin(){
   window.location = 'dashboard.php';
 }
</script>

