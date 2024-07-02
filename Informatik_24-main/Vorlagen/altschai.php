<?php
if($_SERVER["REQUEST_METHOD"] == "Post") { 
$vorname  = $_POST["vorname"];
$nachname = $_POST["nachname"];
 echo "Hallo ". $vorname." ".$nachname; 
echo "<br>";
echo "<a href= \"formular.php\">Zurück zur Startseite</a>";
} 
?>
