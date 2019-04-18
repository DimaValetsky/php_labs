<?php
    if (isset($_GET['dir']) && isset($_GET['name'])) {
        $path = $_GET['dir'] . '\\' . $_GET['name'];
        if (!is_file($path))
            rmdir($path);
        else
            unlink($path);
        header('Location: lab3.php?dir='.$_GET['dir']);
    }
?>