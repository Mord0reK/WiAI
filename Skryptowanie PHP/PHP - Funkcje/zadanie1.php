<?php

function spr_pierwsza($liczba)
{
    for ($i=2; $i < $liczba; $i++)
    {
        if ($liczba % $i == 0)
        {
            echo "Liczba $liczba nie jest liczbą pierwszą.";
            return;
        }
    }
    echo "Liczba $liczba jest liczbą pierwszą.";
    return;
}

$testowa = 10;

spr_pierwsza($testowa);

?>