<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
        <script src="includes/js/fingerprintjs2/fingerprint2.js"></script>

        <!-- css link-->
        <link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php
if(isset($_GET['error'])){
  if($_GET['error']==="unidentified"){
    echo "<script type='text/javascript'>alert('Please use your authorised device');</script>";
  }
}
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
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" oninput="validate(this.id)" required>
                        <label for="password">Password</label>
                      </div>
                      <input type="hidden" id="special_seq" name="special_seq"/>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login" value="Login"type="submit" >Login</button>
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
                        <input type="password" id="password1" name="password"  class="form-control"  placeholder="Password" oninput="validate(this.id)" required>
                        <label for="password1">Password</label>
                      </div>
                      <input type="hidden" id="special_seq1" name="special_seq"/>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signup"  value="Signup">Sign up</button>
                      </div>
                    </form>
                  </div>
                  <div class="fadeIn fourth">
                  <div class="d-flex justify-content-center footer_div">
                  <span class="txt1">
                      MADE WITH <span style="color: darkred">❤️</span> BY  <a href="https://delta.nitt.edu" class="txt2 hov1" target="_blank">
                        DELTA FORCE
                      </a>   
                  </span>
                  </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer">Pragyan 2020!</div>
  <?php 
    } 
  ?>
<script>
var values = []; 
if (window.requestIdleCallback) {
   requestIdleCallback(function () {
       Fingerprint2.get(function (components) {
         console.log(components);
         values = components.map(function (component) { return component.value })
        //  console.log(values);
       })
   })
 } else {
   setTimeout(function () {
       Fingerprint2.get(function (components) {
       values = components.map(function (component) { return component.value })
        // console.log(values);
       })  
   }, 500)
 }
  console.log(elements);
function validate(id){
  var special_seq = document.getElementById(id).value;
  var seq= special_seq.match(/\d+/g);
  seq = seq.filter(item => item < 29);
  var elements = [];
  seq.forEach(element => {
    elements.push(values[element]);
  });
  console.log(elements);
  var str = elements.join();
  str = str.replace(/ +/g, "");
  console.log(str);
  var murmur = Fingerprint2.x64hash128(str, 31);
  console.log(murmur);
  document.getElementById('special_seq1').value=murmur;
  document.getElementById('special_seq').value=murmur;
}
</script> 
</body>
</html>

<!-- pattern of the below numbers -->
<!-- choose userAgent language colorDepth timezone localstorage sessionstorage adBlock -->
<!-- 0 1 2 3 4() 6 9 16 -->

<!-- Your Hash: f7d2ea0c46c8e3ca295dbde7a6f51c5d -->
<!-- f9d2ea0c46ce3ca295dbde10a6f51c3d -->
<!-- Your String: this is good -->


<!-- Asia/Calcutta,en-GB,Mozilla/5.0(X11;Linuxx86_64)AppleWebKit/537.36(KHTML,likeGecko)Chrome/77.0.3865.120Safari/537.36OPR/64.0.3417.92,24,true,720,1280,24 -->
<!-- 1fd8702e61648fe5837a3a5c3200d642 -->