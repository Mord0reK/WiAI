<?php

function pole($x, $y)
{
    return $x * $y;
}

$dlugosc = 4;
$szerokosc = 6;

$pole_prostokata = pole($dlugosc, $szerokosc);

echo "Pole prostokąta wynosi $pole_prostokata";

?>