<?php

$x = 3;
$y = 4;
$z = 5;

if (pow($x, 2) + pow($y, 2) == pow($z, 2))
{
    echo "<h1>Trójkąt jest pitagorejski</h1>";
    $obwod = $x + $y + $z;
    $pole = ($x * $y) / 2;
    echo "Obwód wynosi $obwod, a pole wynosi $pole";
}
else
{
    echo "<h1>Trójkąt nie jest pitagorejski</h1>";
}

?>