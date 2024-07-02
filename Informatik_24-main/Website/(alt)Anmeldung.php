<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Anmeldung</title>
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
            text-decoration: none;
        }

        #buttonar {
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

        #buttonar:hover {
            background-color: #ff4500;
        }
    </style>
</head>

<body>
    <?php 
    session_start();
    ?>

    <h1>Anmeldung</h1>

    <?php 
    $verbindung = new mysqli('localhost', 'root', '', 'pizza'); 
    $verbindung->set_charset('utf8mb4'); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vorname = $_POST['Vorname'];
        $nachname = $_POST['Nachname'];
        
        // Überprüfen, ob die Person bereits in der Datenbank ist
        $stmt = $verbindung->prepare("SELECT Kundennummer FROM kundennummer WHERE Vorname = ? AND Nachname = ?");
        $stmt->bind_param("ss", $vorname, $nachname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Speichern der Benutzerdaten in der Session
            $_SESSION['vorname'] = $vorname;
            $_SESSION['nachname'] = $nachname;
            $_SESSION['kundennummer'] = $row['Kundennummer'];

            echo "<p>Anmeldung erfolgreich</p>";
            echo '<div id="Weiter">';
            echo '<a href="Bestellformular.php">';
            echo '<button id="buttonar">Bestellformular</button>';
            echo '</a>';
            echo '</div>';
        } else {
            echo "<p>Diese Person ist nicht registriert.</p>";
            echo '<div id="Weiter">';
            echo '<a href="Registrierung.php">';
            echo '<button id="buttonar">Registrierung</button>';
            echo '</a>';
            echo '</div>';
        }

        $stmt->close();
    } else {
    ?>

    <form method="post" action="">
        <label for="vorname">Vorname:</label>
        <input type="text" name="Vorname" required>
        <br>

        <label for="nachname">Nachname:</label>
        <input type="text" name="Nachname" required>
        <br>

        <button type="submit">Anmelden</button>
    </form>

    <?php } 
    $verbindung->close();
    ?>

</body>

</html>
