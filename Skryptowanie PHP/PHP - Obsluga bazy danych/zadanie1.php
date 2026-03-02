<?php

$connection = mysqli_connect("wytrychy-db", "root", "rootpassword", "Wytrychy-21-11");

$zapytanie = mysqli_query($connection, "INSERT INTO aktorzy (imie, nazwisko, plec, kraj_ur, data_ur) VALUES ('Marcel', 'Stosio', '', '', '2137-04-04')");

mysqli_close($connection);