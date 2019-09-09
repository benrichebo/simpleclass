<?php 

if (isset($_SESSION['userPassword'])) {
  header('Location: ./');
} elseif(isset($_SESSION['adminPassword'])) {
  header('Location: ./');
}else{
    
}

?>
<div class="text-center col-md-3 m-auto">
<form class="form-signin mt-5">
  <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="text" id="inputPassword" class="form-control" placeholder="Password" required="">
  <div class="mt-3">
    <select id="selectClasses" class="form-control mb-3">
    </select>
  </div>
  <button id="signup" class="btn btn-lg btn-primary btn-block" type="button">Sign Up</button>
   <div class="mt-3">
    <p>Have an account? <a href=".?page=login"> Login</a></p>
   </div>
</form>
</div>
