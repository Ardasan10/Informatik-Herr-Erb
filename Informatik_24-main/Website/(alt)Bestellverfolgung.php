<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['vorname']) || !isset($_SESSION['nachname']) || !isset($_SESSION['kundennummer'])) {
    // Falls nicht angemeldet, Weiterleitung zur Anmeldeseite
    header('Location: Anmeldung.php');
    exit();
}
?>

<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Bestellverfolgung</title> 
        <?php echo htmlspecialchars($_SESSION['vorname']) . ' ' . htmlspecialchars($_SESSION['nachname']); ?>
    </head> 
    <body>


	Ihre Bestellung ist soeben bei uns eingegangen
	<br>
	Voraussichtliche Zustellung in 45min


        
