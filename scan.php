<?php
header('Content-Type: application/json');

function scanDirectory($dir) {
    $result = [];
    $files = scandir($dir);
    
    foreach($files as $file) {
        if($file === '.' || $file === '..' || $file === '.git') continue;
        
        $path = $dir . '/' . $file;
        if(is_dir($path)) {
            $result[$file] = scanDirectory($path);
        } else {
            $result[$file] = null;
        }
    }
    
    return $result;
}

$structure = scanDirectory('.');
echo json_encode($structure);
?>