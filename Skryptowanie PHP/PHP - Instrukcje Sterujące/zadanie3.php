<?php

$tablica = [];
$suma = 0;

for ($i=0; $i<10; $i++)
{
    $tablica[$i] = rand(1,20);
    $suma += $tablica[$i];
}


# Wypisywanie tabeli

echo "<h1>Oto wylosowane liczby</h1>";
for ($i=0; $i<10; $i++)
{
    echo "$tablica[$i] \t";
}

$srednia = $suma / 20;
echo "<h1>Oto średnia: $srednia</h1>";

?>