<?php
    if (isset($_GET['dir']) && isset($_GET['name']) && isset($_GET['newname']))
    {
        $path = $_GET['dir'].'\\'.$_GET['newname'];
        if (!file_exists($path)) 
            rename($_GET['dir'].'\\'.$_GET['name'], $path);
        header('Location: lab3.php?dir='.$_GET['dir']);
        
    }
    else
    {
        echo '<h1>Change filename in directory to:</h1>';
        echo '<form action="rename.php" method="GET">';
        echo '<input type="text" name="dir" size="40" readonly value="'.$_GET['dir'].'"></input><br><br>';
        echo '<input type="text" name="name" size="40" readonly value="'.$_GET['name'].'"></input><br><br>';
        echo '<input type="text" name="newname" size="40"></input><br><br>
              <input type="submit" size="40"></input>
              </form>';
    }
?>
