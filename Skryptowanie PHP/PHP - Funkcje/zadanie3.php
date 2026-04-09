<?php

function pitagoras($x, $y, $z)
{
    if (pow($x, 2) + pow($y, 2) == pow($z, 2))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function pole($x, $y)
{
    return ($x * $y) / 2;
}

$przyprostokatna_x = 6;
$przyprostokatna_y = 8;
$przeciwprostokatna = 10;

$czy_pitagoras = pitagoras($przyprostokatna_x, $przyprostokatna_y, $przeciwprostokatna);

if ($czy_pitagoras)
{
    $pole = pole($przyprostokatna_x, $przyprostokatna_y);
    echo "Pole wynosi $pole";
}
else
{
    echo "To nie są boki trójkąta prostokatnego.";
}
?>