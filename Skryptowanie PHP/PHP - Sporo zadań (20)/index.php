<?php
require_once 'baza.php';

if (isset($_POST['dodaj']))
{
    $zapytanie = $pdo->prepare("INSERT INTO zamowienia (Samochody_id, klient, telefon, dataZam) VALUES (:samochod, :klient, :telefon, :data_zamowienia)");
    $zapytanie -> bindValue(':klient', $_POST['klient'], PDO::PARAM_STR);
    $zapytanie -> bindValue(':telefon', $_POST['telefon'], PDO::PARAM_STR);
    $zapytanie -> bindValue(':data_zamowienia', $_POST['data_zamowienia'], PDO::PARAM_STR);
    $zapytanie -> bindValue(':samochod', $_POST['samochod'], PDO::PARAM_INT);

    $zapytanie->execute();

    header("Location: " . $_SERVER['PHP_SELF'] . "#zadanie-14");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania PDO</title>
</head>
<body>

    <h1> PhpMyAdmin dostępne <a href="https://phpmyadmin.mordorek.dev/index.php?route=/database/structure&db=Wytrychy_20_03">tutaj</a></h1>

    <h2>Zadanie 1</h2>
    <?php 
    
    $zapytanie = $pdo->prepare("SELECT * FROM ryby");
    $zapytanie->execute();

    foreach($zapytanie as $ryba) {
        echo $ryba['id'] . " ";
        echo $ryba['nazwa'] . " ";
        echo $ryba['wystepowanie'] . "";
        echo $ryba['styl_zycia'] . " ";
        echo "<br>";
    }

    ?>
    <hr>
    <h2>Zadanie 2</h2>

    <?php 
    
    $zapytanie = $pdo->prepare("SELECT nazwa, styl_zycia FROM ryby");
    $zapytanie->execute();

    foreach($zapytanie as $ryba) {
        echo $ryba['nazwa'] . " ";
        echo $ryba['styl_zycia'] . " ";
        echo "<br>";
    }

    ?>
    <hr>
    <h2>Zadanie 3</h2>

    <?php 
    
    $zapytanie = $pdo->prepare("SELECT * FROM samochody WHERE kolor = 'czerwony'");
    $zapytanie->execute();

    foreach($zapytanie as $samochod) {
        echo $samochod['id'] . " ";
        echo $samochod['marka'] . " ";
        echo $samochod['model'] . " ";
        echo $samochod['rocznik'] . " ";
        echo $samochod['kolor'] . " ";
        echo $samochod['stan'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 4</h2>

    <?php 
    
    $zapytanie = $pdo->prepare("SELECT * FROM uzytkownik WHERE nazwisko LIKE 'k%'");
    $zapytanie->execute();

    foreach($zapytanie as $uzytkownik) {
        echo $uzytkownik['id'] . " ";
        echo $uzytkownik['imie'] . " ";
        echo $uzytkownik['nazwisko'] . " ";
        echo $uzytkownik['telefon'] . " ";
        echo $uzytkownik['email'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 5</h2>

    <?php 
    
    $zapytanie = $pdo->prepare("SELECT * FROM samochody ORDER BY rocznik ASC");
    $zapytanie->execute();

    foreach($zapytanie as $samochod) {
        echo $samochod['id'] . " ";
        echo $samochod['marka'] . " ";
        echo $samochod['model'] . " ";
        echo $samochod['rocznik'] . " ";
        echo $samochod['kolor'] . " ";
        echo $samochod['stan'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 6</h2>
    <form method="post">

        <input type="number" name="identyfikator">
        <input type="submit" name="submit" value="Szukaj">

    </form>
    <?php 
    
    if (isset($_POST["submit"]) && $_POST["identyfikator"] != '')
        {
            $zapytanie = $pdo->prepare("SELECT * FROM ryby WHERE id = :identyfikator;" );
            $zapytanie -> bindValue(':identyfikator', $_POST['identyfikator'], PDO::PARAM_INT);
            $zapytanie->execute();
        }


    foreach($zapytanie as $ryba) {
        echo $ryba['id'] . " ";
        echo $ryba['nazwa'] . " ";
        echo $ryba['wystepowanie'] . "";
        echo $ryba['styl_zycia'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 7</h2>
    <form method="get">

        <input type="text" name="wojewodztwo">
        <input type="submit" name="submit" value="Szukaj">

    </form>
    <?php 
    
    if (isset($_GET["submit"]) && $_GET["wojewodztwo"] != '')
        {
            $zapytanie = $pdo->prepare("SELECT * FROM lowisko WHERE wojewodztwo LIKE :wojewodztwo;" );
            $zapytanie -> bindValue(':wojewodztwo', '%'.$_GET['wojewodztwo'].'%', PDO::PARAM_STR);
            $zapytanie->execute();
        }


    foreach($zapytanie as $lowisko) {
        echo $lowisko['id'] . " ";
        echo $lowisko['Ryby_id'] . " ";
        echo $lowisko['akwen'] . "";
        echo $lowisko['rodzaj'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 8</h2>
    <form method="get">

        <input type="number" name="rocznik">
        <input type="submit" name="submit" value="Szukaj">

    </form>
    <?php 
    
    if (isset($_GET["submit"]) && $_GET["rocznik"] != '')
        {
            $zapytanie = $pdo->prepare("SELECT * FROM samochody WHERE rocznik < :rocznik;" );
            $zapytanie -> bindValue(':rocznik', $_GET['rocznik'], PDO::PARAM_INT);
            $zapytanie->execute();
        }


    foreach($zapytanie as $samochod) {
        echo $samochod['id'] . " ";
        echo $samochod['marka'] . " ";
        echo $samochod['model'] . " ";
        echo $samochod['rocznik'] . " ";
        echo $samochod['kolor'] . " ";
        echo $samochod['stan'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 9</h2>
    <form method="get">

        <input type="text" name="email">
        <input type="submit" name="submit" value="Szukaj">

    </form>
    <?php 
    
    if (isset($_GET["submit"]) && $_GET["email"] != '')
        {
            $zapytanie = $pdo->prepare("SELECT * FROM uzytkownik WHERE email LIKE :email;" );
            $zapytanie -> bindValue(':email', '%'.$_GET['email'].'%', PDO::PARAM_STR);
            $zapytanie->execute();
        }

    foreach($zapytanie as $uzytkownik) {
        echo $uzytkownik['id'] . " ";
        echo $uzytkownik['imie'] . " ";
        echo $uzytkownik['nazwisko'] . " ";
        echo $uzytkownik['telefon'] . " ";
        echo $uzytkownik['email'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 10</h2>
    <form method="get">
`
        <input type="text" name="ryba">
        <input type="submit" name="submit" value="Szukaj">

    </form>
    <?php 
    
    if (isset($_GET["submit"]) && $_GET["ryba"] != '')
        {
            $zapytanie = $pdo->prepare("SELECT * FROM ryby WHERE nazwa LIKE :ryba;" );
            $zapytanie -> bindValue(':ryba', '%'.$_GET['ryba'].'%', PDO::PARAM_STR);
            $zapytanie->execute();
        }

    foreach($zapytanie as $ryba) {
        echo $ryba['id'] . " ";
        echo $ryba['nazwa'] . " ";
        echo $ryba['wystepowanie'] . "";
        echo $ryba['styl_zycia'] . " ";
        echo "<br>";
    }

    ?>

    <hr>
    <h2>Zadanie 11</h2>

    <form method="post">
        <input type="submit" name="submit" value="Dodaj">
    </form>

    <?php

    if (isset($_POST["submit"]))
    {
        $zapytanie = $pdo->prepare("INSERT INTO uzytkownik (imie, nazwisko, telefon, email) VALUES ('Jan', 'Kowalski', '213769420', 'garca@mordorek.dev')");
        $zapytanie->execute();
    }

    ?>


    <hr>
    <h2>Zadanie 12</h2>

    <form method="post">
        <label for="id">Podaj ID</label><br>
        <input type="number" name="id"><br>
        <label for="telefon">Podaj numer telefonu</label><br>
        <input type="text" name="telefon"><br><br>
        <input type="submit" name="modyfikuj" value="Modyfikuj">
    </form>

    <?php

    if (isset($_POST["modyfikuj"]))
    {
        $zapytanie = $pdo->prepare("UPDATE uzytkownik SET telefon = :telefon WHERE id = :id");
        $zapytanie -> bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $zapytanie -> bindValue(':telefon', $_POST['telefon'], PDO::PARAM_STR);
        $zapytanie->execute();
    }

    ?>


    <hr>
    <h2>Zadanie 13</h2>

    <form method="post">
        <label for="id">Podaj ID</label><br>
        <input type="number" name="id"><br>
        <input type="submit" name="usun" value="Usuń">
    </form>

    <?php

    if (isset($_POST["usun"]))
    {
        $zapytanie = $pdo->prepare("DELETE FROM samochody WHERE id = :id");
        $zapytanie -> bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $zapytanie->execute();
    }

    ?>

    <hr>
    <h2>Zadanie 14</h2>

    <?php
        $zapytanie = $pdo->prepare("SELECT id, marka, model, rocznik, kolor, stan FROM samochody");
        $zapytanie->execute();
        $samochody = $zapytanie->fetchAll();
    ?>




    <form method="post">
        <label for="klient">Podaj imie i nazwisko klienta</label><br>
        <input type="text" name="klient"><br><br>
        <label for="telefon">Podaj numer telefonu</label><br>
        <input type="text" name="telefon"><br><br>
        <label for="data" name="data_zamowienia">Podaj date zamówienia</label><br>
        <input type="date" name="data_zamowienia"><br><br>
        <select id="samochod" name="samochod" aria-label="Default select example">
            <option value="" selected>Wybierz samochód</option>
            <?php
            foreach ($samochody as $row) {
                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['marka']) . " " . htmlspecialchars($row['model']) . " " . htmlspecialchars($row['rocznik']). " " . htmlspecialchars($row['kolor']) . " " . htmlspecialchars($row['stan'])
                 . '</option>';
            }
            ?>
        </select><br><br>
        <input type="submit" name="dodaj" value="Dodaj zamówienie">
    </form>

    <hr>
    <h2>Zadanie 15</h2>

    <?php

        $zapytanie = $pdo->prepare("SELECT nazwa, akwen FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id");
        $zapytanie->execute();
    ?>

    <table border="1">

        <tr>
            <th>Ryba</th>
            <th>Akwen</th>
        </tr>

        <?php
            foreach ($zapytanie as $row)
            {
                echo '<tr>';
                echo '<td>' . $row['nazwa'] . "</td>" . "<td>" . $row['akwen'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <hr>
    <h2>Zadanie 16</h2>

    <?php
        $zapytanie = $pdo->prepare("SELECT Klient, telefon, DataZam, marka, model FROM zamowienia INNER JOIN samochody ON zamowienia.Samochody_id = samochody.id");
        $zapytanie->execute();
        $wynik = $zapytanie->fetchAll();
    ?>

    <table border="1">

        <tr>
            <th>Klient</th>
            <th>Telefon</th>
            <th>Data Zamówienia</th>
            <th>Marka</th>
            <th>Model</th>
        </tr>

        <?php
        foreach ($wynik as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['Klient'] . "</td>" . "<td>" . $row['telefon'] . '</td>' . "<td>" . $row['DataZam'] . '</td>' . "<td>" . $row['marka'] . '</td>' . "<td>" . $row['model'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <hr>
    <h2>Zadanie 17</h2>

    <?php
        $zapytanie = $pdo->prepare("SELECT sportowiec_id, wynik, dataUstanowienia FROM wyniki");
        $zapytanie->execute();
        $wynik = $zapytanie->fetchAll();
    ?>

    <table border="1">

        <tr>
            <th>sportowiec_id</th>
            <th>wynik</th>
            <th>dataUstanowienia</th>
        </tr>

        <?php
        foreach ($wynik as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['sportowiec_id'] . "</td>" . "<td>" . $row['wynik'] . '</td>' . "<td>" . $row['dataUstanowienia'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <hr>
    <h2>Zadanie 18</h2>

    <?php
        $zapytanie = $pdo->prepare("SELECT Count(*) FROM samochody");
        $zapytanie->execute();
        $wynik = $zapytanie->fetchAll();
        echo $wynik[0][0];
    ?>

    <hr>
    <h2>Zadanie 19</h2>

    <?php
        $zapytanie = $pdo->prepare("SELECT AVG(wynik) FROM wyniki");
        $zapytanie->execute();
        $wynik = $zapytanie->fetchAll();
        echo $wynik[0][0];
    ?>

    <hr>
    <h2>Zadanie 20</h2>

    <table border="1">

        <tr>
            <th>Ilość</th>
            <th>Styl życia</th>
        </tr>

        <?php
            $zapytanie = $pdo->prepare("SELECT Count(*) AS Ilość, styl_zycia FROM ryby GROUP BY styl_zycia");
            $zapytanie->execute();
            $wynik = $zapytanie->fetchAll();

            foreach ($wynik as $row)
            {
                echo '<tr>';
                echo '<td>' . $row['Ilość'] . "</td>" . "<td>" . $row['styl_zycia'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>

</body>
</html>