<?php

    if (!file_exists($_POST['dir'] . '\\' . $_FILES['newfile']['name']))
        move_uploaded_file($_FILES['newfile']['tmp_name'], $_POST['dir'] . '\\' . $_FILES['newfile']['name']);
    }
    header('Location: lab3.php?dir='.$_POST['dir']);
?>