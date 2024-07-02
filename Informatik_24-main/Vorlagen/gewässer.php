<html>
<head>
    <meta charset="UTF-8">
    <title>capital search</title>
    <?php
        // Datenbankverbindung aufbauen
        $verbindung = new mysqli("localhost", "root","","mondial");
        $verbindung -> set_charset('utf8mb4'); // muss dem der Datenbank entsprechen

    ?>
</head>
<body>
    <form method="post">
        <label for="country">capital of: </label>
        <input type="text" name="country" required>
        <input type="submit" value="search">
    </form>

    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $sea = $_POST["country"];
            // Daten aus Datenbank abrufen
            // Anfrage vorbereiten
            $anfrage = $verbindung -> prepare("
                SELECT river.name
                FROM river
                  JOIN sea ON river.sea = sea.id 
             WHERE sea.name = ?	
                  
                
            ");
        
            // Anfrage mit Werten ausstatten: s=String, i=Integer
            $anfrage -> bind_param("s", $sea);

            // Anfrage ausführen
            $anfrage -> execute();

            // Ergebnisse der Anfrage an Variable knüpfen
            $anfrage -> bind_result($capital);

            while ($anfrage -> fetch()) {
                echo "<p> The capital of ".$country." is ".$capital.".";
            }

            // Ergebnisvariablen freigeben
            $anfrage -> free_result();

            // Verbindung trennen
            $verbindung -> close();
        }
        ?>
</body>
</html>
