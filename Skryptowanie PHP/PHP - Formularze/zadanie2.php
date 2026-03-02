<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie2</title>
</head>
<body>
<h1>Przelicznik walut</h1>
<form action="zadanie2.php" method="post">
    <p><b>Kwota w zl</b>
    <br><input type="text" name="kwota"></p>
    <p><input type="radio" name="waluta" value="Funt"> Funt brytyjski</p>
    <p><input type="radio" name="waluta" value="Euro"> Euro</p>
    <p><input type="submit" value="Przelicz"></p>
</form>
<?php
if(isset($_POST['kwota']) && isset($_POST['waluta'])){
    $kwota = floatval($_POST['kwota']);
    $waluta = $_POST['waluta'];

    if($waluta == "Funt"){
        $wynik = floatval($kwota / 5.2);
        echo "<p>Kwota $kwota zł to " . round($wynik, 2) . " funtów brytyjskich</p>";
    } elseif($waluta == "Euro"){
        $wynik = floatval($kwota / 4.3);
        echo "<p>Kwota $kwota zł to " . round($wynik, 2) . " euro</p>";
    }
}
?>
</body>
</html>
