<?php


if(isset($_POST['signup']))
{
  require 'db.php';
  $username= $_POST['username'];
  $passwd= $_POST['password'];
  if(empty($username) || empty($passwd) )
    {
      header("Location:../index.php?error=empty");
      exit();
    }
  else
    {
      $sql="SELECT username FROM pandorausers WHERE username=?";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql))
      {
       header("Location:../index.php?error=dberror");
    	exit();
      }
      else
      {
      	mysqli_stmt_bind_param($stmt, "s", $username);
      	mysqli_stmt_execute($stmt);
      	mysqli_stmt_store_result($stmt);
      	$row=mysqli_stmt_num_rows($stmt);
      	if($row>0)
      	{
         header("Location:../index.php?error=useralreadyexists");
    	   exit();
      	}
      	else
      	{
      		$sql="INSERT INTO pandorausers (username, password) VALUES (?, ?)";
      		if(!mysqli_stmt_prepare($stmt, $sql))
      		{
      		header("Location:../index.php?error=sdberror");
    	    exit();	
      		}
      		mysqli_stmt_bind_param($stmt, "ss", $username, $passwd);
      	  mysqli_stmt_execute($stmt);
      	  header("Location:../index.php?signup=successful");
    	    exit();
        }
      }
    }
 mysqli_stmt_close($stmt);
 mysqli_close($conn);
}
else
{
  	header("Location:../index.php");
    exit();
}
?>