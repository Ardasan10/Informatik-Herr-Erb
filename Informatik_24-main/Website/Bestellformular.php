<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['vorname']) || !isset($_SESSION['nachname']) || !isset($_SESSION['kundennummer'])) {
    // Falls nicht angemeldet, Weiterleitung zur Anmeldeseite
    header('Location: Anmeldung.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bestellformular</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .pizza {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .pizza img {
            max-width: 100px;
            margin-right: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .pizza label {
            font-size: 1.2em;
            margin-bottom: 5px;
            flex: 1;
        }

        .pizza input[type="number"] {
            width: 60px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .pizza .price {
            font-weight: bold;
        }

        .gesamtpreis {
            margin-top: 10px;
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
        }

        .haudenalexknopf {
            margin-top: 20px;
            text-align: center;
        }

        .haudenalexknopf input[type="submit"] {
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1em;
            padding: 10px 20px;
            box-shadow: 2px 2px 5px #000;
        }

        .haudenalexknopf input[type="submit"]:hover {
            background-image: url('Photos/hehe.png');
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hallöchen, Was darfs sein?</h1>
        <h2> <?php echo htmlspecialchars($_SESSION['vorname']) . ' ' . htmlspecialchars($_SESSION['nachname']); ?></h2>

        <form id="bestelformular" method="post" action="Bestellverfolgung.php">
            <div class="pizza">
                <img src="Photos/margerita.jfif" alt="Margerita Pizza">
                <label for="Margerita">Margerita:</label>
                <input type="number" name="Margerita" min="0" value="0" preis="10" required>
                <span class="price">10 €</span>
            </div>

            <div class="pizza">
                <img src="Photos/schinken.jpg" alt="Schinken Pizza">
                <label for="Schinken">Schinken:</label>
                <input type="number" name="Schinken" min="0" value="0" preis="6.90" required>
                <span class="price">6.90 €</span>
            </div>

            <div class="pizza">
                <img src="Photos/vegetarisch.png" alt="Vegetarisch Pizza">
                <label for="Vegetarisch">Vegetarisch:</label>
                <input type="number" name="Vegetarisch" min="0" value="0" preis="7.42" required>
                <span class="price">7.42 €</span>
            </div>

            <div class="pizza">
                <img src="Photos/fungi.jfif" alt="Fungi Pizza">
                <label for="Fungi">Fungi:</label>
                <input type="number" name="Fungi" min="0" value="0" preis="6.90" required>
                <span class="price">6.9 €</span>
            </div>

            <div class="gesamtpreis">Gesamtpreis: <span id="gesamtpreis">0.00 €</span></div>

            <div class="haudenalexknopf">
                <input type="submit" value="Bestelle">
            </div>
        </form>
    </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('bestelformular');
            const inputs = form.querySelectorAll('input[type="number"]');
            const totalPriceSpan = document.getElementById('gesamtpreis');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    calculateTotal();
                });
            });

            function calculateTotal() {
                let total = 0;
                inputs.forEach(input => {
                    const price = parseFloat(input.getAttribute('preis'));
                    const quantity = parseInt(input.value);
                    total += price * quantity;
                });

                totalPriceSpan.textContent = total.toFixed(2) + ' €';
            }
        });
     </script>

    </body>
</html>