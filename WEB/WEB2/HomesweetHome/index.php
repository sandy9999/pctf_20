<?php

class pageContent{
  private $file_name;
  private $newContent;

  function __construct() 
  { 
    $this->file_name="txt/content.txt"; 
    $file = file_get_contents($this->file_name);
    $this->newContent=$file;
  } 

  function setContent($newContent){
    $this->newContent=$newContent;
  }

  function __destruct() 
  { 
    $fd=fopen($this->file_name,"w");
    fwrite($fd,$this->newContent);
    fclose($fd);
  } 
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="css/index.css">
  <script src="includes/js/fingerprintjs2/fingerprint2.js"></script> 
	<title>
		Form Builder
	</title>
</head>
<body>
  <h1>Form Builder</h1>
  <div id="hash"></div>
  <script>
  if (window.requestIdleCallback) {
    requestIdleCallback(function () {
        Fingerprint2.get(function (components) {
          console.log(components) // an array of components: {key: ..., value: ...}
          var values = components.map(function (component) { return component.value })
          var murmur = Fingerprint2.x64hash128(values.join(''), 31)
          console.log(murmur);
          document.getElementById("hash").innerHTML=murmur;
        })
    })
  }
//  else {
//     setTimeout(function () {
//         Fingerprint2.get(function (components) {
//           console.log(components) // an array of components: {key: ..., value: ...}
//         })  
//     }, 500)
// }
// Fingerprint2.get(options, function (components) {
//   console.log("HASH:");
 
//     console.log(murmur);
// })
  </script>
<?php
  if(!isset($_SESSION['NAME']))
  {
    ?>
    <!-- Login page -->
    <div>
    <form  method="post" action="includes/login.php">
    <input name="username" type="text"/>
    <input name="password" type="password"/>
    <input type="submit" name="login" value="Login"/>
    </form>
    </div>
    <!-- Registration page -->
    <div>
    <form  method="post" action="includes/registration.php">
    <input name="username" type="text"/>
    <input name="password" type="password"/>
    <input type="submit" name="signup" value="Signup"/>
    </form>
    </div>
<?php
  }

function setFooter(){
  if(isset($_GET['newFooter'])){
    $newFooter=unserialize(base64_decode($_GET["newFooter"]));
    echo '<div class="footer">'+$newFooter+'</div>';
  }
  else{
    echo '<div class="footer">Pragyan 2020!</div>';
  }
}

setFooter();

?>
</body>
</html>



<!-- chrome bdd01b553000d1cdc7a0670bcd5b69aa -->





