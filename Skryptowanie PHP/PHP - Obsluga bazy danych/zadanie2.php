<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>
<body>
<form action="zadanie2.php" method="post">
	<p><b>ID: </b>
		<br><input type="text" name="id" value="20" readonly></p>
    <p><b>Imie: </b>
        <br><input type="text" name="imie"></p>
    <p><b>Nazwisko</b>
        <br><input type="text" name="nazwisko"> </p>
    <p><b>Płeć</b>
        <br><input type="text" name="plec"> </p>
    <p><b>Kraj urodzenia</b>
        <br><input type="text" name="kraj_ur"> </p>
    <p><b>Data urodzenia</b>
        <br><input type="date" name="data_ur"> </p>
    <p><input type="submit" value="Zamów"></p>
</form>
<?php
	$id=$_POST['id'];
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $plec=$_POST['plec'];
    $kraj_ur=$_POST['kraj_ur'];
    $data_ur=$_POST['data_ur'];

    $connection = mysqli_connect("wytrychy-db", "root", "rootpassword", "Wytrychy-21-11");

    mysqli_set_charset($connection, "utf8");

    $zapytanie = "INSERT  INTO  aktorzy  VALUES  ('$id', '$imie',  '$nazwisko',  '$plec'  , '$kraj_ur','$data_ur')";

    mysqli_query($connection, $zapytanie);

    mysqli_close($connection);
?>
</body>
</html>








