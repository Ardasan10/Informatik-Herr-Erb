<html> 
<head> 
<title> Altschauerberg.com </title> 
</head> 
<body> 
<?php 

for($i=2;$i<100;$i++) { 
ist_prim = true; 
teiler = 2; 
while($teiler < $i){ 
if ( $i % $teiler == 0){ 
$ist_prim = false; 
}
$teiler ++;
}

if($ist_prim == true){
echo "$i ist eine priemzahl";  
} 
$i ++;
} 
?>  
</html>

 
 
