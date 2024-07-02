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
        <label for="ozean">Name des Ozeans (engl.)</label>
        <select name="ozean">
    <?php
            $anfrage = $verbindung -> prepare("
                SELECT sea.name
                FROM sea
            ");
        
            // Anfrage mit Werten ausstatten: s=String, i=Integer
            //$anfrage -> bind_param("s", $ozean);

            // Anfrage ausführen
            $anfrage -> execute();

            // Ergebnisse der Anfrage an Variable knüpfen
            $anfrage -> bind_result($ozean);

            while ($anfrage -> fetch()) {
                echo "<option value='$ozean'>".$ozean."</option>";
            }

            // Ergebnisvariablen freigeben
            $anfrage -> free_result();

            // Verbindung trennen
            //$verbindung -> close();
    ?>
        </select>
        <input type="submit" value="anzeigen">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ozean = $_POST["ozean"];
            echo "<p> In den ".$ozean." münden die Flüsse: <br>";

            $anfrage = $verbindung -> prepare("
                SELECT River.name
                FROM River
                  JOIN sea ON sea.id = river.Sea
                WHERE sea.Name = ?
            ");
        
            // Anfrage mit Werten ausstatten: s=String, i=Integer
            $anfrage -> bind_param("s", $ozean);

            // Anfrage ausführen
            $anfrage -> execute();

            // Ergebnisse der Anfrage an Variable knüpfen
            $anfrage -> bind_result($fluss);

            while ($anfrage -> fetch()) {
                echo $fluss."<br>";
            }

            // Ergebnisvariablen freigeben
            $anfrage -> free_result();

            // Verbindung trennen
            $verbindung -> close();
            echo "</p>";
        }
        ?>
</body>
</html>
