<table border="1">
    <tr>
        <td>Imi</td>
        <td>Nazwisko</td>
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

    $zapytanie = "SELECT imie, nazwisko, stanowisko FROM pracownicy";

    $wynik = $polaczenie->query($zapytanie);

    while($wiersz = $wynik->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr>";
        echo "<td>".$wiersz['imie']."</td>";
        echo "<td>".$wiersz['nazwisko']."</td>";
        echo "<td>".$wiersz['stanowisko']."</td>";
        echo "</tr>";
    }
?>
</table>