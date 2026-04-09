<?php

echo "<script>alert('Dodano rezerwację do bazy;')</script>";

$data_rez=$_POST['data'];
$osob=$_POST['osoby'];
$nr_tel=$_POST['telefon'];


$con = mysqli_connect("wytrychy-db", "root", "rootpassword", "baza-restauracja");

$zapytanie = mysqli_query($con, "INSERT INTO rezerwacje (nr_stolika, data_rez, liczba_osob, telefon) VALUES (5, '$data_rez', $osob, '$nr_tel')");

mysqli_close($con)
