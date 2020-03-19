<?php
include 'includes/db.php';
session_start();
if(!isset($_SESSION['NAME']))
{
  header("Location:index.php?error=wrngaccess");
  exit();
}
$name=$_SESSION['NAME'];
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
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
<body class="profle">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4 text-center">
<div id="videowrap" style="margin:auto auto ;"><video id="video" playsinline  autoplay ></video></div>
<div class="snap">
  <button id="takesnap">Capture</button>
</div>
<canvas id="snappedpic" width="400" height="400"></canvas>
<div id="extra"></div>
</div>
<div class="col-sm-4"></div>
</div>
<?php 
include 'includes/db.php';
?>
<script>
'use strict';
const video=document.getElementById("video");
const canvas=document.getElementById("snappedpic");
const snap=document.getElementById("takesnap");
const errorMsgElement=document.getElementById("span#ErrorMsg");
const constraints={
  audio: false,
  video:{
    width:400,height:400
  }
};
async function init(){
  try{
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  }
  catch(e){
    errorMsgElement.innerHTML=`navigator.getUserMedia.error:'${e.toString}`;
  }
}
function handleSuccess(stream){
 window.stream=stream;
 video.srcObject=stream;
}
init();
var context=canvas.getContext('2d');
snap.addEventListener("click",function(){
context.drawImage(video,0,0,400,400);
const dataurl= canvas.toDataURL("image/jpeg");
console.log(dataurl);
var xml=new XMLHttpRequest();
xml.open("POST","savepic.php",true);
var param="uploadimage="+dataurl;
xml.setRequestHeader('Content-type','application/x-www-form-urlencoded');
xml.send(param);
});
</script> 
</body>
</html>
