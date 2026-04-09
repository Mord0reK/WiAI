<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>PHP - Pliki</title>
    </head>
    <body>
        <h1>Zadanie 1</h1>
        <?php

            $plik = fopen("dane.txt", "r");
            $tekst = fread($plik, 5);
            echo $tekst;

        ?>

        <hr>
        <h1>Zadania 2</h1>

        <?php

            $plik = fopen("tekst.txt", "r");
            while (!feof($plik))
            {
                echo fgets($plik) . "<br>";
            }
        ?>
        <hr>
        <h1>Zadania 3</h1>
        <?php
            $tekst = "";
            $plik = fopen("tekst.txt", "r");
            while (!feof($plik))
            {
                $tekst = $tekst . fgets($plik);
            }

            echo strlen($tekst);
        ?>
        <hr>
        <h1>Zadania 4</h1>

        <?php

            $plik = fopen("liczby.txt", "r");
            $suma = 0;
            while (!feof($plik))
            {
                $suma = $suma + fgets($plik);
            }
            echo $suma;
        ?>

        <hr>
        <h1>Zadania 5</h1>
        <?php

            $plik = fopen("wynik.txt", "w");

            for ($i = 1; $i <= 10; $i++)
            {
                fwrite($plik, $i . "\n");
            }
            fclose($plik);

            $plik = fopen("wynik.txt", "r");
            while (!feof($plik))
            {
                echo fgets($plik);
            }

        ?>

        <hr>
        <h1>Zadania 6</h1>

        <?php

            $plik = fopen("dane.txt", "r");

            while (!feof($plik))
            {
                echo fgets($plik) . "<br>";
            }

        ?>

        <hr>
        <h1>Zadania 7</h1>

        <?php

            $plik = fopen("imiona.txt", "r");

            while (!feof($plik))
            {
                $linia = fgets($plik);
                if (strlen($linia) > 5)
                {
                    echo $linia . "<br>";
                }
            }

        ?>

        <hr>
        <h1>Zadania 8</h1>

        <?php

        $plik = fopen("wejscie.txt", "r");

        while (!feof($plik))
        {
            $tekst = $tekst . fgets($plik);
        }

        $plik = fopen("wyjscie.txt", "w");

        fwrite($plik, $tekst);

        $plik = fopen("wyjscie.txt", "r");
        while (!feof($plik))
        {
            echo fgets($plik). "<br>";
        }
        ?>

        <hr>
        <h1>Zadania 9</h1>

        <?php

        $plik = fopen("tekst.txt", "r");
        $licznik = 0;
        while (!feof($plik))
        {
            $linia = fgets($plik);
            for ($i = 0; $i < strlen($linia); $i++)
            {
                if ($linia[$i] == "a")
                {
                    $licznik++;
                }
            }
        }
        echo $licznik;

        ?>

        <hr>
        <h1>Zadania 10</h1>

        <?php

        $plik = fopen("liczby.txt", "r");
        $maks = 0;
        while (!feof($plik))
        {
            $liczba = fgets($plik);
            if ($liczba > $maks)
            {
                $maks = $liczba;
            }
        }
        echo $maks;

        ?>
    </body>
</html>
