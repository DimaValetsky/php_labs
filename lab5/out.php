<?php

$link = mysqli_connect ('localhost','new','','test');

$sql = "SELECT * FROM `table_firm`";
$result = mysqli_query($link,$sql);
echo "<h2>Вывод записей:</h2>";

while($row = mysqli_fetch_assoc($result)) {

    echo "{$row['Name']} "; 
    echo "{$row['Address']} ";
    echo "{$row['Phone']} ";
    echo "{$row['email']}<br />";

}
?>