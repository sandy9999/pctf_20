<?php
  session_start();
  if(!isset($_SESSION['NAME'])){
    header("Location:index.php?error=ldberror");
    exit();	
  }
  require 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pragyan CTF</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body class="profile">
  <div class="navbar">
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="includes/logout.php">Logout</a></li> 
  </ul>
  </div>
<br>
<hr style="border: 2px solid red;"/>
<?php
 $name= $_SESSION['NAME'];
 if(empty($name))
 {
   header("Location:../index.php?error=lempty");
   exit();
 }
 
 $sql="SELECT * FROM messages WHERE username=?";
 $stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$sql))
  {
   header("Location:index.php?error=ldberror");
   exit();	
  }
 else
  {
   mysqli_stmt_bind_param($stmt, "s", $name);
   mysqli_stmt_execute($stmt);
   $rows=mysqli_stmt_get_result($stmt);
   if($row=mysqli_fetch_assoc($rows))
   {
    $flag=$row['message'];
    echo '<div class="footer">'.$flag.'</div>';
   }
   else{
     echo '<div class="footer">No Messages</div>';
   }
  }

?>

</body>
</html>
	