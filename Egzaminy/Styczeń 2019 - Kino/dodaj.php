<?php
$tytul = $_POST['tytul'];
$gatunek = $_POST['gatunek'];
$rok_produkcji = $_POST['rok-produkcji'];
$ocena = $_POST['ocena'];

$db = mysqli_connect("wytrychy-db", "root", "rootpassword", "kino-egzamin");

$query = "INSERT INTO filmy (tytul, gatunek, rok_produkcji, ocena) VALUES ('$tytul', '$gatunek', $rok_produkcji, $ocena)";
mysqli_query($db, $query);

echo '<p> Film $tytul został dodany do bazy. </p>';

mysqli_close($db);