<?php
 session_start();
 require 'includes/db.php';
 $name=$_SESSION['NAME'];
 if(isset($_POST['uploadimage'])){
    $image=$_POST['uploadimage'];
    $image = str_replace('data:image/jpeg;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $fileData = base64_decode($image);
    $sql="SELECT * FROM instabook WHERE username='".$name."'";
    $rows=$conn->query($sql);
    $row=$rows->fetch_assoc();
    $picturename=$row['picture'];
    if($picturename===null)
    {
    $picturename=uniqid();
    $picturename="includes/picture/".$picturename.".jpeg";
    $sql="UPDATE instabook SET profilepic='".$picturename."' WHERE username='".$name."'";
    $conn->query($sql);
    }
    file_put_contents($picturename, $fileData);
  }
?>