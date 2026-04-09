<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie1</title>
</head>
<body>
<h1>Zakup zeszytów</h1>
<form action="zadanie1.php" method="post">
    <p><b>Zeszyty w linie (1,5 zł/szt)</b>
    <br><input type="text" name="linie"></p>
    <p><b>Zeszyty w kratke (1,3 zł/szt)</b>
    <br><input type="text" name="kratke"> </p>
    <p><b>Zeszyty gładkie (1 zł/szt)</b>
    <br><input type="text" name="gladkie"> </p>
    <p><input type="submit" value="Zamów"></p>
</form>
<?php
  echo "<p> Dokonales nastepujacych zakupow: </p>";

  $linie=$_POST['linie'];
  $kratke=$_POST['kratke'];
  $gladkie=$_POST['gladkie'];

  echo "<p> Zeszyty w linie: $linie szt. </p>";
  echo "<p> Zeszyty w kratke: $kratke szt. </p>";
  echo "<p> Zeszyty gladkie: $gladkie szt. </p>";

  $koszt_wszytkie=($linie*1.5)+($kratke*1.3)+($gladkie*1);

  echo "<p> Koszt wszystkich zeszytow wynosi: $koszt_wszytkie zl </p>";
?>
</body>
</html>
