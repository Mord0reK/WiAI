<?php

setcookie('test', 'ok', time() + 3600);
setcookie('kolor', '#D69989', time() + 3600);
setcookie('licznik', (isset($_COOKIE["licznik"]) ? $_COOKIE["licznik"] + 1 : 1), time() + 3600);

# Zadanie 10
setcookie('czas', "xd", time() + 604800);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['imie']) && !isset($_POST['usun'])) {
    setcookie('imie', $_POST['imie'], time() + 3600);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usun'])) {
    setcookie('imie', "", time() - 3600);
    setcookie('test', "", time() - 3600);
    setcookie('kolor', "", time() - 3600);
    setcookie('licznik', "", time() - 3600);
    setcookie('czas', "", time() - 3600);
    setcookie('login', "", time() - 3600);
    setcookie('rola', "", time() - 3600);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['rola'])) {
    setcookie('login', $_POST['login'], time() + 3600);
    setcookie('rola', $_POST['rola'], time() + 3600);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['rola'])) {
    setcookie('login', $_POST['login'], time() + 3600);
    setcookie('rola', $_POST['rola'], time() + 3600);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ciasteczka</title>
</head>
<body style="background-color: <?php echo isset($_COOKIE['kolor']) ? $_COOKIE['kolor'] : '#ffffff'; ?>">

<?php

if (empty($_COOKIE)) {
    echo "<div style='border: 2px solid red;'>";
    echo "<strong>Brak cookies!</strong> Wszystkie ciasteczka zostały usunięte.";
    echo "</div>";
}
?>

<h1>Zadanie 1</h1>
<p>Ustawiono cookie 'test'</p>

<h1>Zadanie 2</h1>
<?php

if (isset($_COOKIE['test'])) {
    echo $_COOKIE['test'];
} else {
    echo "Cookie 'test' nie istnieje (będzie dostępne po odświeżeniu strony)";
}
?>

<h1>Zadanie 3</h1>

<h1>Zadanie 4</h1>

<form method="post" action="index.php">
    <input type="text" name="imie" value="">
    <input type="submit">
</form>

<?php

if (isset($_COOKIE['imie'])) {
    echo $_COOKIE['imie'];
} else {
    echo "Cookie 'imie' nie istnieje, zrób formularz";
}
?>

<h1>Zadanie 5</h1>

<?php
if (isset($_POST["imie"]) && !empty($_POST["imie"])) {
    echo "<p>Siema " . $_POST["imie"] . "</p>";
} else {
    echo "<p style='color: red;'>Brak danych - wyślij formularz!</p>";
}
?>

<h1>Zadanie 6</h1>

<form action="index.php" method="post">
    <input type="submit" name="usun" value="Usuń wszystkie cookies">
</form>

<h1>Zadanie 8</h1>
<?php

echo "Tyle odwiedzin: ";
echo isset($_COOKIE["licznik"]) ? $_COOKIE["licznik"] : "0";
?>

<h1>Zadanie 9</h1>

<form method="post" action="index.php">
    <input type="text" name="login" value="">
    <input type="text" name="rola" value="">
    <input type="submit">
</form>

<?php

echo "Login: ";
echo isset($_COOKIE["login"]) ? $_COOKIE["login"] : "brak";
echo "<br>Rola: ";
echo isset($_COOKIE["rola"]) ? $_COOKIE["rola"] : "brak";

?>

<h1>Zadanie 10</h1>


</body>
</html>