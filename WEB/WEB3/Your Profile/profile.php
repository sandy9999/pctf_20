<?php
  session_start();
  if(!isset($_SESSION['NAME'])){
    header("Location:../index.php?error=wrngaccess");
    exit();	
  }
  $name = $_SESSION['NAME'];
  require 'includes/db.php';
  $sql="SELECT * FROM instabook WHERE username='".$name."'";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
  {
   header("Location:../index.php?error=ldberror");
   exit();	
  }
  else
  {
  	// mysqli_stmt_bind_param($stmt, "s", $name);
   	mysqli_stmt_execute($stmt);
   	$rows=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($rows))
    {
      $picture=$row['profilepic'];
      if($picture==null)
      {
        $picture="includes/picture/0.png";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pragyan CTF</title>
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
  <div class="navBar">
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="includes/logout.php">Logout</a></li> 
  </ul>
  </div>
<br>
<?php
echo "<div class='imgcontain' style='margin:10px auto;'><img id='profilepic' src='".$picture."' class='img-thumbnail float-left' height='250' width='250'><div class='imgoverlay'></div><div id='imgbutton'><a href='takepicture.php'>Change Photo</a></div></div>";
?>
<hr style="border: 2px solid red;"/>
<div class="footer">Pragyan 2020!</div>
</body>
</html>
	