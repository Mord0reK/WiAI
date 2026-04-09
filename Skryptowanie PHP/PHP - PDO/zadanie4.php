<table border="1">
    <tr>
        <td>Imię</td>
        <td>Nazwisko</td>
        <td>Wiek</td>
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

$zapytanie = "INSERT INTO uczniowie (imie, nazwisko, wiek) VALUES (:imie, :nazwisko, :wiek);";

$instrukcja = $polaczenie->prepare($zapytanie);

$instrukcja -> execute([
    'imie' => 'Adam',
    'nazwisko' => 'Kowal',
    'wiek' => 10
]);

echo "Dodano ucznia do bazy danych.";

$zapytanie = "SELECT imie, nazwisko, wiek FROM uczniowie";

$wynik = $polaczenie->query($zapytanie);

while($wiersz = $wynik->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";
    echo "<td>".$wiersz['imie']."</td>";
    echo "<td>".$wiersz['nazwisko']."</td>";
    echo "<td>".$wiersz['wiek']."</td>";
    echo "</tr>";
}

?>

</table>