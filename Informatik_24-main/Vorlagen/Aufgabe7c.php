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

    <?php
            $anfrage = $verbindung -> prepare("
                SELECT province.name, city.name
                FROM province
                  JOIN city ON city.province = Province.id
                WHERE  province.country = 'D' AND city.id = province.capital
            ");
        
            // Anfrage mit Werten ausstatten: s=String, i=Integer
            //$anfrage -> bind_param("s", $country);

            // Anfrage ausführen
            $anfrage -> execute();

            // Ergebnisse der Anfrage an Variable knüpfen
            $anfrage -> bind_result($provinz, $hauptstadt);

            while ($anfrage -> fetch()) {
                echo "<p> Die Landeshauptstadt von ".$provinz." ist ".$hauptstadt.".</p>";
            

            // Ergebnisvariablen freigeben
            $anfrage -> free_result();

            // Verbindung trennen
            $verbindung -> close();
        ?>
</body>
</html>
