<html>
<head> 
<title>Zinsrechner</title> 
       <meta charset="UTF-8">  
</head> 
<body> 
<?php 
if(($_SERVER["REQUEST_METHOD"] == "POST")){ 
     $kapital =  $_POST["start"];
     $zinssatz = $_POST["zins"]; 
     $laufzeit = $_POST["l"]; 
    
    $geld = $kapital*pow( (1+ $zinssatz / 100),$laufzeit); 
    echo "ihr endkapital beträgt".$geld;  
    
} 
?>
</body> 
</html>
