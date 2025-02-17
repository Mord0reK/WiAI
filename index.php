<?php
// Ustalenie katalogu bazowego
$baseDir = __DIR__;
$dir = isset($_GET['dir']) ? $_GET['dir'] : '';
$targetDir = realpath($baseDir . DIRECTORY_SEPARATOR . $dir);

// Weryfikacja, czy $targetDir znajduje się w obrębie katalogu bazowego
if ($targetDir === false || strpos($targetDir, $baseDir) !== 0) {
    die("Dostęp zabroniony.");
}

// Odczyt katalogu
$files = scandir($targetDir);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądarka katalogów</title>
</head>
<body>
    <h1>Przeglądarka katalogów</h1>
    <ul>
        <?php
        // Link do katalogu nadrzędnego, jeśli nie jesteśmy w katalogu bazowym
        if ($targetDir !== $baseDir) {
            $parent = dirname($dir);
            echo '<li><a href="?dir=' . urlencode($parent) . '">[..]</a></li>';
        }
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            $relativePath = ltrim($dir . DIRECTORY_SEPARATOR . $file, DIRECTORY_SEPARATOR);
            $fullPath = $targetDir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($fullPath)) {
                echo '<li>[DIR] <a href="?dir=' . urlencode($relativePath) . '">' . htmlspecialchars($file) . '</a></li>';
            } else {
                echo '<li>' . htmlspecialchars($file) . '</li>';
            }
        }
        ?>
    </ul>
</body>
</html>
