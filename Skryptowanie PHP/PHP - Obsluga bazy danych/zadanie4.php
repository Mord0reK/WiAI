<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>
<body>
<?php
$connection = mysqli_connect("wytrychy-db", "root", "rootpassword", "Wytrychy-21-11");

mysqli_set_charset($connection, "utf8");

$zapytanie = "SELECT * from aktorzy WHERE data_ur > '1990-01-01';";

if ($wynik = $connection->query($zapytanie))
{
    while ($obj = $wynik->fetch_object())
    {
        echo "Imię: " . $obj -> imie . "<br>";
        echo "Nazwisko: " . $obj -> nazwisko . "<br>";
        echo "Płeć: " . $obj -> plec . "<br>";
        echo "Kraj urodzenia: " . $obj -> kraj_ur . "<br>";
        echo "Data urodzenia: " . $obj -> data_ur . "<br>";
    }
}

mysqli_close($connection);
?>
</body>
</html>








