<?php
if(isset($_POST['login']))
{
  require 'db.php';
  $name= $_POST['username'];
  $passwd= $_POST['password'];
  $frontendprint= $_POST['special_seq'];
  if(empty($name) || empty($passwd) || empty($frontendprint))
    {
      header("Location:../index.php?error=lempty123");
      exit();
    }
  else
  {
  	$sql="SELECT * FROM admin WHERE username=?";
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
        $hashpwd = $row['password'];
        $fingerprint = $row['browserfingerprint'];
        if($passwd === $hashpwd)
           {
             if($fingerprint === $frontendprint){
              session_start();
              $_SESSION['NAME']=$row['username'];
              $_SESSION['PWD']=$row['password'];
              header("Location:../profile.php?success=welcome");
              exit();
             }
             else{
              header("Location:../index.php?error=unidentified");
              exit();
             }
           }
        else
           {
            	header("Location:../index.php?error=mismatch");
              exit();
           }
          
        }
        else
        {
       	header("Location:../index.php?error=nousr");
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