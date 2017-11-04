<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <img src="<?php echo base_url('assets/logo/logo2.png'); ?>">
      <div class="card-header img-fluid"  alt="Responsive image" style="text-align: center;"></div>
      <div class="card-body">       
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="username" type="text" aria-describedby="emailHelp" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" type="password" placeholder="Password">
          </div>
          <div class="failed-login alert alert-warning" style="display: none;">
            <em><strong>Error:</strong>  The User Name or Password entered is incorrect.  Please try again.</em>
          </div>
          <hr>
          <button class="btn btn-primary btn-block" id="login" >Login</button>
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</body>