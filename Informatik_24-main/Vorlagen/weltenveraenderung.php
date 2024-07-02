<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Weltenveränderung</title> 
    </head> 
    <body> 
        
        <?php 
        $verbindung = new mysqli('localhost','root','','test'); 
        $verbindung -> set_charset('utf8mb4'); 
        
        // Anfrage vorbereiten 
        $anfrage = $verbindung -> prepare(" 
            DELETE  FROM country  
             where name='Eschachcity'");
               
            
        // Anfrage ausführen 
        $anfrage -> execute (); 
        
        // Ergebnisvariablen freigeben 
        $anfrage -> free_result();

        // Verbindung trennen 
        $verbindung -> close(); 
        
        echo "Einfügen erfolgreich."; 
        ?> 
        
    </body> 
</html>
