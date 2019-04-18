<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Лабораторная работа №2</title>
    </head>
    <body>
        <table>
        
<?php
    if (isset($_POST['quantity']) & ((integer)$_POST['quantity'] >= 10) )
    {
        $quantity=(integer)$_POST['quantity'];
        for ($i = 1; $i <= $quantity; $i++)
        {
            // Расчет цветов
            $curr_back = dechex($i % 16);
            $background = $curr_back . $curr_back . $curr_back . $curr_back . $curr_back . $curr_back;
            
            // Добавление в html кода
            if ($i % 5 == 0)
                echo '<tr style="background-color: green "><td>'.$i.'</td></tr>';
            else
                echo '<tr style="background-color: #' . $background . ' "><td>'.$i.'</td></tr>';
        }
    }
?>
        </table>
    </body>

</html>