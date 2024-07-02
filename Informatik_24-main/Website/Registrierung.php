<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierung</title>
    <style>
      

	body {
            font-family: Arial, sans-serif;
            background-image: url('photos/pizza_background.jfif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: contain;
            background-position: center;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
     	   }

        h1 {
            margin-top: 50px;
            font-size: 3em;
            text-shadow: 2px 2px 5px #000;
   	     }

        form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 30px;
            box-shadow: 2px 2px 10px #000;
   	     }

        label {
            font-size: 1.2em;
            display: block;
            margin: 10px 0 5px 0;
    	    }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: calc(100% - 22px);
    	    }

        button {
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1em;
            padding: 10px 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 5px #000;
   	     }

        button:hover {
            background-color: #ff4500;
    	    }

        #Weiter {
            margin-top: 20px;
     	   }
	
        #Weiter a { 
      	  }

        #buttonde {
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1em;
            padding: 10px 20px;
            margin-top: 20px;
            box-shadow: 2px 2px 5px #000;
    	    }

        #buttonde:hover {
            background-color: #ff4500;
   	     }
    </style>
</head>
<body>
    <?php 
    $verbindung = new mysqli('localhost', 'root', '', 'pizza'); 
    $verbindung->set_charset('utf8mb4'); 

    if ($verbindung->connect_error) {
        die("Verbindung fehlgeschlagen: " . $verbindung->connect_error);
   	 }

    $buttonClicked = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Vorname = $_POST["Vorname"]; 
        $Nachname = $_POST["Nachname"]; 
        $Anschrift = $_POST["Anschrift"]; 
        $Telefonnummer = $_POST["Telefonnummer"]; 

        // Anfrage vorbereiten 
        $anfrage = $verbindung->prepare("INSERT INTO kundennummer (Vorname, Nachname, Anschrift, Telefonnummer) VALUES (?, ?, ?, ?)");  

        // Bind Param ändern auf "ssss" da Telefonnummer auch als String behandelt wird
        $anfrage->bind_param("ssss", $Vorname, $Nachname, $Anschrift, $Telefonnummer); 

        // Anfrage ausführen 
        if ($anfrage->execute()) {
            $buttonClicked = true;
            echo "<p>Registrierung erfolgreich</p>";
        } else {
            echo "<p>Fehler: " . $anfrage->error . "</p>";
        }

        $anfrage->close(); 
        $verbindung->close(); 
  	  }
?>

    <h1>Registrierung</h1>

    <form method="post" action="">
        <label for="Vorname">Vorname:</label> 
        <input type="text" name="Vorname" required>  
        <br> 

        <label for="Nachname">Nachname:</label> 
        <input type="text" name="Nachname" required>  
        <br> 

        <label for="Anschrift">Anschrift:</label> 
        <input type="text" name="Anschrift" required>  
        <br> 

        <label for="Telefonnummer">Telefonnummer:</label> 
        <input type="text" name="Telefonnummer" required>  
        <br> 

        <button type="submit">Registrieren</button>
    </form>

    <?php if ($buttonClicked): ?>
        <div id="Weiter">
            <a href="Anmeldung.php">
                <button id="buttonde">Anmeldung</button>
            </a>
        </div>
    <?php endif; ?>

</body>
</html>