<?php
$id = 4;

$serwer = "wytrychy-db";
$baza = "Wytrychy_13_03";
$uzytkownik = "root";
$haslo = "rootpassword";

$polaczenie = new PDO(
    "mysql:host=$serwer;dbname=$baza;charset=utf8",
    $uzytkownik,
    $haslo
);


$zapytanie = "DELETE FROM uzytkownik WHERE id = :id;";

$instrukcja = $polaczenie->prepare($zapytanie);

$instrukcja -> execute([
    ':id'=>$id
]);

?>