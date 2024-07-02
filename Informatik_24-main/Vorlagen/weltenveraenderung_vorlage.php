<html>
<head>
    <meta charset="UTF-8">
    <title>Weltenveränderung</title>
    <?php
        // Datenbankverbindung aufbauen
        $verbindung = new mysqli("HOST","root","","mondial");
        $verbindung -> set_charset('utf8mb4'); // muss dem der Datenbank entsprechen

    ?>
</head>
<body>

    <?php
    
        // Daten aus Datenbank abrufen
        // Anfrage vorbereiten
        $anfrage = $verbindung -> prepare("");
                  SELECT country.name 
                  FROM country 
                  ORDER BY country.name ASC
        // Anfrage mit Werten ausstatten: s=String, i=Integer
        // $anfrage -> bind_param("ssi", $eing1, $eing2, $eing3);

        // Anfrage ausführen
        $anfrage -> execute();

        // Ergebnisse der Anfrage an Variable knüpfen
        $anfrage -> bind_result($land);

        while ($anfrage -> fetch()) {
            echo $land."<br>";
        }

        // Ergebnisvariablen freigeben
        $anfrage -> free_result();

        // Verbindung trennen
        $verbindung -> close(); 
        
    ?>

</body>
</html>
