<?php
    $db = "Wytrychy_16_04";
    $host = "mysql-db";
    $user = "root"
    $pass = "rootpassword";
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    $conn = new mysqli($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section class="lewa">
            <h2>Personel</h2>
            <form method="post">
                <input type="radio" name="status" value="Policjant" checked>Policjant
                <input type="radio" name="status" value="Ratownik">Ratownik
                <input type="submit" value="Pokaż">
            </form>
            <table border="1">
                <tr>
                    <th colspan="3">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Imię &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nazwisko</th>
                </tr>


            <?php 
                if (isset($_POST['status'])) {
                    $warunek = $_POST['status'];
                }
                else
                {
                    $warunek = "Policjant";
                }

                $zapytanie = "SELECT id, imie, nazwisko FROM personel WHERE status='$warunek'";
                $wynik = mysqli_query($conn, $zapytanie);

                echo "<h2>Wybrano opcję: $warunek </h2>";

                while ($wiersz = mysqli_fetch_assoc($wynik)) {
                    echo "<tr>";
                    echo "<td>".$wiersz['id']."</td>";
                    echo "<td>".$wiersz['imie']."</td>";
                    echo "<td>".$wiersz['nazwisko']."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </section>
        <section class="prawa">
            <h2>Nowe zgłoszenie</h2>

        </section>
    </main>
    <footer>

    </footer>
</body>
</html>