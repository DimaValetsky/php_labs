<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Лабораторная работа №3</title>
    </head>
    <body>
        <h1>Файловый менеджер</h1>
        <div class="manipulate-area">
            <?php
                $currDir = getcwd();
                    if(isset($_GET['dir'])) {
                        $currDir = $_GET['dir'];
                    }
                echo '<h3>Current directory: '. $currDir;
                if ($currDir != getcwd()) {
                    echo '<a href="lab3.php?dir='.dirname($currDir).'" class="buttons green"><i class="fas fa-arrow-left"></i> Back</a></h3>';
                }
                else {
                    echo '</h3>';
                }
            ?>
        <div>
            <form enctype="multipart/form-data" action="upload.php" method="POST">
                <p>Upload new file</p>
                <input type="file" name="newfile" size="40" required></input>
                <?php echo '<input type="text" name="dir" style="display: none;" value="'.$currDir.'" readonly></input>';?>
                <input type="submit" size="40" value="Upload"></input>
            </form>
            <form action="addDir.php" method="GET">
                <p>Create new directory</p>
                <input type="text" name="name" size="40"></input>
                <?php echo '<input type="text" name="dir" style="display: none;" value="'.$currDir.'" readonly></input>';?>
                <input type="submit" size="40" value="Create"></input>
            </form>
        </div>
            
        </div>
        <div class="flex-container">
            <div class="table-area">
                    <?php
                        echo '<table>
                        <tr><th colspan=2>Name</th><th>Size</th><th>Date</th><th colspan=2></th><th class="al-center">Delete</th>
                        </tr>
                        <tr>';
                        $catalogContent = scandir($currDir);
                        for ($i = 2; $i < count($catalogContent); $i++) {
                            if (filesize($currDir .'\\'.$catalogContent[$i]) == 0 && !is_file($currDir .'\\'.$catalogContent[$i])) {
                                echo '<td><i class="fas fa-folder"></i></td>';
                                echo '<td>' . $catalogContent[$i] . '</td>';
                                echo '<td>--</td>';
                                echo '<td></td>';
                                echo '<td><a href="lab3.php?dir='.$currDir . '\\' . $catalogContent[$i].'" class="buttons green">Open</a></td>';
                                echo '<td><a href="rename.php?dir='.$currDir.'&name='.$catalogContent[$i].'" class="buttons green">Rename</a></td>';
                                echo '<td><a href="delete.php?dir='.$currDir.'&name='.$catalogContent[$i].'" class="buttons red">Delete</a></td>';
                            }
                            else {
                                echo '<td><i class="fas fa-file"></i></td>';
                                echo '<td>' . $catalogContent[$i] . '</td>';
                                echo '<td>' . filesize($currDir .'\\' . $catalogContent[$i]) . ' bytes</td>';
                                echo '<td>' . date (" d/m/Y H:i:s", filemtime($currDir .'\\'.$catalogContent[$i])) . '</td>';
                                echo '<td></td>';
                                echo '<td><a href="rename.php?dir='.$currDir.'&name='.$catalogContent[$i].'" class="buttons green">Rename</a></td>';
                                echo '<td><a href="delete.php?dir='.$currDir.'&name='.$catalogContent[$i].'" class="buttons red">Delete</a></td>';
                            }
                            echo '</tr>';
                        }

    
                    ?>
                </table>
            </div>
        </div>
    </body>

</html>