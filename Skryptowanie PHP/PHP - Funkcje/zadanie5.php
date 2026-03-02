<?php

$przyslowie = "Kto pyta, nie błądzi"

$wynik = strcmp($przyslowie, "Kto");

if ($wynik)
{
    echo "<h1>W przysłowiu znajduje się "Kto"</h1>";
}
else
{
    echo "<h1>W przysłowiu nie znajduje się "Kto"</h1>";
}
?>