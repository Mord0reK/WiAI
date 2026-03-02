<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
<?php
$connection = mysqli_connect("wytrychy-db", "root", "rootpassword", "Wytrychy-21-11");

mysqli_set_charset($connection, "utf8");

$zapytanie = "SELECT * from aktorzy WHERE data_ur > '1990-01-01';";

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
?>
</body>
</html>








