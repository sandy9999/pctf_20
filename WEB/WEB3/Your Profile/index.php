<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
	<title>
		Pragyan CTF
	</title>
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
        

        <!-- Bootstrap 4 links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            
        <!-- fontawesome cdn -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <!-- css link-->
        <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
  if(!isset($_SESSION['NAME']))
  {
?>
          <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="fadeInDown">
                <div class="card card-signin my-5">
                  <div class="card-body">
                       <!-- Login  -->
                      <div class="login100-form-title p-b-33">
                          <div class="fadeIn first">
                          <h3 class="login100-form-title" style="text-align: center">Pragyan CTF</h3>
                          </div>
                          <div class="fadeIn second">
                          <h5 class="card-title text-center">Login</h5>
                          </div>
                      </div>
                    <form class="form-signin" method="post" action="includes/login.php">
                      <div class="fadeIn third">
                      <div class="form-label-group">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username" required autofocus>
                        <label for="username">Username</label>
                      </div>
        
                      <div class="form-label-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <label for="password">Password</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login" value="Login"type="submit">Login</button>
                      </div>
                    </form>
                  </div>

                  <!-- Registration  -->
                  <div class="card-body">
                    <div class="login100-form-title p-b-33">
                          <div class="fadeIn second">
                          <h5 class="card-title text-center">Registration</h5>
                          </div>
                    </div>
                    <form class="form-signin" method="post" action="includes/registration.php">
                      <div class="fadeIn third">
                      <div class="form-label-group">
                        <input id="username1" name="username" type="text" class="form-control" placeholder="Username" required autofocus>
                        <label for="username1">Username</label>
                      </div>
        
                      <div class="form-label-group">
                        <input type="password" id="password1" name="password"  class="form-control" placeholder="Password" required>
                        <label for="password1">Password</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signup" value="Signup">Sign up</button>
                      </div>
                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
<?php
  }
?>
          <div class="footer">Pragyan 2020!</div>
</body>
</html>