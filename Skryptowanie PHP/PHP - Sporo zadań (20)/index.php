<?php
require_once 'baza.php'; 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania PDO</title>
</head>
<body>
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
</body>
</html>