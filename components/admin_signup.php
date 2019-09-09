<?php 
?>
<div class="text-center col-md-3 m-auto">
<form class="form-signin mt-5">
  <h1 class="h3 mb-3 font-weight-normal">Lecturers Sign up</h1>
  <label for="inputEmail" class="sr-only">Full name</label>
  <input type="text" id="inputName" class="form-control" placeholder="Name" required="" autofocus="">
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="text" id="inputPassword" class="form-control" placeholder="Password" required="">
  <div class="mt-3 mb-1">
    <select id="inputDepartment" class="form-control mb-3">
      <option value="">--Select Department--</option>
      <option value="EEE">EEE</option>
      <option value="REE">REE</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
  <label for="inputPassword" class="sr-only">Code</label>
  <input type="text" id="inputCode" class="form-control" placeholder="Code" required="">
  <button id="signupAdmin" class="btn btn-lg btn-primary btn-block mt-4" type="button">Sign Up</button>
   <div class="mt-3">
    <p>Have an account? <a href=".?page=login"> Login</a></p>
   </div>
</form>
</div>
