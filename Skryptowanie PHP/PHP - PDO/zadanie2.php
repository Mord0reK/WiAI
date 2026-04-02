<table border="1">
    <tr>
        <td>Filmy</td>
    </tr>

<?php

$serwer = "mysql-db";
$baza = "Wytrychy_13_03";
$uzytkownik = "root";
$haslo = "rootpassword";

$polaczenie = new PDO(
    "mysql:host=$serwer;dbname=$baza;charset=utf8",
    $uzytkownik,
    $haslo
);

$zapytanie = "SELECT tytul FROM filmy WHERE ocena = 5;";

$wynik = $polaczenie->query($zapytanie);

while($wiersz = $wynik->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";
    echo "<td>".$wiersz['tytul']."</td>";
    echo "</tr>";
}

?>

</table>