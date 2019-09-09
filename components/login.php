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
      <img class="mb-4" src="." alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button id="login" class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
      <div class="mt-3">
          <p>New user? <a href=".?page=signup"> Sign up</a></p>
      </div>
    </form>
</div>
