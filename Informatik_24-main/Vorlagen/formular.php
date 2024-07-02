<html>
    <head>
        <title>Formular</title>
    </head>
    <body>
        <form method="POST" action="altschai.php">
            <table width="50%" style="border: 1px solid black; text-align: center; margin: 0 auto">
                <tr>
                    <td>
                        Jahr:
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="von" required>
                    </td>
                    <td>
                        <input type="text" name="bis">
                    </td>
                    <td>
                        <input type="submit" value="absenden">
                    </td>
                </tr> 
         <?php 
for($i = $_POST["von"]; $i < $_POST["bis]; $i++){ 
echo date ("d.M.Y", easter_date($i));
}
if($_SERVER["REQUEST_METHOD"] == "POST") { 

echo "<br>"; 
echo $i;
        ?> 
            </table>
        </form>
    </body>
</html>
