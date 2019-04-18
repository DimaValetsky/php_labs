<?php

$link = mysqli_connect ('localhost','new','','test');

$sql = "SELECT * FROM `table_firm`";
$result = mysqli_query($link,$sql);
echo "<h2>Поиск фирм:</h2>";
$find = $_POST['find'];
while($row = mysqli_fetch_assoc($result)) {
	if ($row['Name'] == $find) {
	
	
    echo "{$row['Name']} "; 
    echo "{$row['Address']} ";
    echo "{$row['Phone']} ";
    echo "{$row['email']}<br />";
	}

}
?>