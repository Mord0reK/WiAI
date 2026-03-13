<table border="1">
    <tr>
        <td>Dania</td>
    </tr>

<?php

$serwer = "wytrychy-db";
$baza = "Wytrychy_13_03";
$uzytkownik = "root";
$haslo = "rootpassword";

$polaczenie = new PDO(
    "mysql:host=$serwer;dbname=$baza;charset=utf8",
    $uzytkownik,
    $haslo
);

$zapytanie = "SELECT nazwa FROM dania WHERE cena > 20;";

$wynik = $polaczenie->query($zapytanie);

while($wiersz = $wynik->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";
    echo "<td>".$wiersz['nazwa']."</td>";
    echo "</tr>";
}

?>

</table>