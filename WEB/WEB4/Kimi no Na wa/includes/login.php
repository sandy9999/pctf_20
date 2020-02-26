<?php
if(isset($_POST['login']))
{
  require 'db.php';
  $name= $_POST['username'];
  $passwd= $_POST['password'];
  if(empty($name) || empty($passwd))
    {
      header("Location:../index.php?error=lempty123");
      exit();
    }
  else
  {
  	$sql="SELECT * FROM kimiusers WHERE username=?";
  	$stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
     header("Location:../index.php?error=ldberror");
     exit();	
    }
    else
    {
    	mysqli_stmt_bind_param($stmt, "s", $name);
    	mysqli_stmt_execute($stmt);
    	$rows=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($rows))
        {
        $hashpwd=$row['password'];
        if(strcmp($passwd,$hashpwd)==0)
           {
               session_start();
               $_SESSION['NAME']=$row['username'];
               $_SESSION['PWD']=$row['password'];
               header("Location:../profile.php?success=welcome");
               exit();
           }
         else
           {
            	header("Location:../index.php?error=lmismatch");
              exit();
           }
          
        }
        else
        {
       	header("Location:../index.php?error=lnousr");
        exit();
        }
    }
  }
}
else
{
  header("Location:../index.php?error=noform");
  exit();
}
?>