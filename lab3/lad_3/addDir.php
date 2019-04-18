<?php
    if (isset($_GET['dir']) && isset($_GET['name'])) {
        $path = $_GET['dir'] . '\\' . $_GET['name'];
        if (!file_exists($path)) {
            mkdir($path);
        }   
        header('Location: lab3.php?dir='.$_GET['dir']);
    }
?>
