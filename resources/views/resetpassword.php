<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Youth Community Service Program</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="../../ycsp-frontend/bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="../../ycsp-frontend/styles/main.css">
    <!-- endbuild -->
  </head>
  <body ng-app="ycspApp">
    <!--[if lte IE 8]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="container">
    <div ui-view></div>
      <div class="container">
          <div class="row main">
            <div class="panel-heading">
               <div class="panel-title text-center">
                <h1 class="title">rest Password (YCSP)</h1>
                <hr />
              </div>
            </div> 
            <div class="main-login main-center">
              <p>{{login.errorMessage}}</p>
              <form name="resetPasswordForm" ng-submit="resetPasswordForm.$valid && reset.resetPassword(reset.userData)" novalidate ng-controller="resetPasswordController"> 
                <div class="form-group">
                  <label for="email" class="cols-sm-2 control-label">Password</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your password"  ng-model='reset.userData.password' required/>
                      <span ng-show="(resetPasswordForm.password.$dirty || resetPasswordForm.$submitted) && resetPasswordForm.password.$error.required">Please enter your password.</span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="cols-sm-2 control-label">Password</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="confirm" placeholder="Confirm your Password"  ng-model='reset.userData.password' required/>
                      <span ng-show="(resetPasswordForm.confirm.$dirty || resetPasswordForm.$submitted) && resetPasswordForm.confirm.$error.required">Confirm your password.</span>
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>


    </div>

    <div class="footer">
      <div class="container">
        <p><span class="glyphicon glyphicon-heart"></span> from the YCSP team</p>
      </div>
    </div>

    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    <script src="../../ycsp-frontend/bower_components/jquery/dist/jquery.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular/angular.js"></script>
    <script src="../../ycsp-frontend/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-animate/angular-animate.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-aria/angular-aria.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-cookies/angular-cookies.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-messages/angular-messages.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-resource/angular-resource.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-route/angular-route.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-touch/angular-touch.js"></script>
    <script src="../../ycsp-frontend/bower_components/angular-ui-router/release/angular-ui-router.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

	<!-- build:js({.tmp,app}) scripts/scripts.js -->
	<script src="../../ycsp-frontend/scripts/app.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/main.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/about.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/users.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/login.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/register.js"></script>
	<script src="../../ycsp-frontend/scripts/services/loginservice.js"></script>
	<script src="../../ycsp-frontend/scripts/services/registerservice.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/forgot.js"></script>
	<script src="../../ycsp-frontend/scripts/controllers/dashboard.js"></script>
	<script src="../../ycsp-frontend/scripts/services/dashboardservice.js"></script>
	<script src="../../ycsp-frontend/scripts/directives/passwordmatch.js"></script>
	<script src="../../ycsp-frontend/scripts/services/forgotservice.js"></script>
	<!-- endbuild -->
	<script src="../../ycsp-frontend/scripts/constant.js"></script>
</body>
</html>
