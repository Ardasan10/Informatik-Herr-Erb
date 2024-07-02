<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Weltenveränderung</title> 
    </head> 
    <body>

        <?php 
        $verbindung = new mysqli('localhost','root','','test'); 
        $verbindung -> set_charset('utf8mb4'); 
        ?> 
        
        <form method="post"> 
            <label for="anzahl">Neue Stadt:</label> 
            <input type="text" name="name" required>  
            <br> 
            <label for "provinz">Provinz:</label>
            <select name="provinz">
        
        
        <?php 
           
            // Anfrage vorbereiten 
            $anfrage = $verbindung -> prepare(" 
             SELECT province.name, province.id 
             FROM province
            
            
          
               
           ");
            
            
            // Anfrage ausführen 
            $anfrage -> execute (); 
             $anfrage -> bind_result($provinz, $id); 
             
            while ($anfrage -> fetch()){ 
               echo "<option value='$id'>$provinz</option>"; 
      }
            // Ergebnisvariablen freigeben 
            
        ?> 
          </select>
          <input type="submit" value="erstellen"> 
          </form>
          <?php 
           if($_SERVER["REQUEST_METHOD"]=="POST") { 
     $stadtname = $_POST ["name"]; 
       $auswahl = $_POST ["provinz"]; 
  // Anfrage vorbereiten 
            $anfrage = $verbindung -> prepare(" 
             INSERT INTO city(name,province) 
             VALUES(?,?) 
       ");  
$anfrage -> bind_param("si", $stadtname, $auswahl); 
  // Anfrage ausführen 
            $anfrage -> execute ();  
$anfrage -> free_result(); 
  $verbindung -> close(); 


    }  
?>
  </select>
          <input type="submit" value="hinzufügen"> 
          </form>
    </body> 
</html>
