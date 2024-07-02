<html>
<head>
    <meta charset="UTF-8">
    <title>capital search</title>
    <?php
        // Datenbankverbindung aufbauen
        $verbindung = new mysqli("localhost", "root","","test");
        $verbindung -> set_charset('utf8mb4'); // muss dem der Datenbank entsprechen

    ?>
</head>
<body> 
 <form method="post"> 
<label for="capital">capital of: </label>
  <input type="text" name="capital" required> 
  <input type="submit" value="search">
  </form>
   
    <?php 

        // Daten aus Datenbank abrufen
        // Anfrage vorbereiten
        $anfrage = $verbindung -> prepare("
            SELECT city.name, province.name
            FROM city
                JOIN province on city.province = province.id
                
            WHERE  province.country = 'D' AND city.id = province.capital
        ");
        
        // Anfrage mit Werten ausstatten: s=String, i=Integer
         

        // Anfrage ausführen
        $anfrage -> execute();

        // Ergebnisse der Anfrage an Variable knüpfen
        $anfrage -> bind_result($hauptstadt.$province);

        while ($anfrage -> fetch()) {
            echo "<p> ".$province." ".$hauptstadt." ;
        }

        // Ergebnisvariablen freigeben
        $anfrage -> free_result();

        // Verbindung trennen
        $verbindung -> close(); 

    ?>
</body>
</html>
