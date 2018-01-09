<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link  href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="<?php echo base_url('assets/logo/logo2.png'); ?>" alt="" class="responsive-img valign profile-image-login">
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"><i class="material-icons">person_outline</i></i>
                    <input id="username" type="text" placeholder="Enter your username">
                    <label for="username" class="custom-font center-align">Username</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"><i class="material-icons">lock_outline</i></i>
                    <input id="password" type="password" placeholder="Password">
                    <label for="password" class="custom-font">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <span class=" failed-login alert alert-warning" style="display: none;"> <em><strong>Error:</strong>  The User Name or Password entered is incorrect.  Please try again.</em></span>
                   <!--  <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label> -->
                    <button class="btn waves-effect waves-light col s12" id="login">Login</button>
                </div>
            </div>
           <!--  <div class="row">
                <div class="input-field col s12">
                    
                    <a href="index.html" class="btn waves-effect waves-light col s12">Login</a>
                </div>
            </div> -->

            <div class="row">
                <!-- <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="page-register.html">Register Now!</a>
                    </p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a>
                    </p>
                </div> -->
            </div>

        </form>
    </div>
</div>
<!-- <body class="bg-dark">
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

          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</body> -->