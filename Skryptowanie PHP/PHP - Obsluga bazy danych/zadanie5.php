<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 5</title>
</head>
<body>
<form action="zadanie5.php" method="post">
    <p><b>Kraj urodzenia</b>
        <br><input type="text" name="kraj_ur"> </p>
    <p><input type="submit" value="Zamów"></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kraj_ur'])) {

    if (empty($_POST['kraj_ur'] && isset($_POST['kraj_ur'])))
    {
        echo "<p> Nie podano kraju urodzenia. </p>";
    }
    else
    {
        $kraj_ur=$_POST['kraj_ur'];

        $connection = mysqli_connect("wytrychy-db", "root", "rootpassword", "Wytrychy-21-11");

        mysqli_set_charset($connection, "utf8");

        $zapytanie = "SELECT * from aktorzy WHERE kraj_ur = '$kraj_ur';";

        $wynik = mysqli_query($connection, $zapytanie);

        echo "<p>Zapytanie: " . $zapytanie . "</p>";

        while ($wiersz = mysqli_fetch_assoc($wynik))
        {
            echo "Imię: " . $wiersz['imie'] . "<br>";
            echo "Nazwisko: " . $wiersz['nazwisko'] . "<br>";
            echo "Płeć: " . $wiersz['plec'] . "<br>";
            echo "Kraj urodzenia: " . $wiersz['kraj_ur'] . "<br>";
            echo "Data urodzenia: " . $wiersz['data_ur'] . "<br>";
            echo "<br><br>";
        }
        mysqli_close($connection);
    }
}
else {
    echo "<p>Proszę wypełnić formularz.</p>";
}
?>
</body>
</html>








