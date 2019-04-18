
<?php
$mysqli = new mysqli("localhost", "my_user", "", "test");

/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s", mysqli_connect_error());
    exit();
}

/* возвращаем имя текущей базы данных */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.", $row[0]);
    echo "<br />";
    $result->close();
}

if (!$mysqli->set_charset("utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
} else {
    printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
    echo "<br />";
}
$copy = FALSE;
$sql = "SELECT * FROM `table_firm`";
$result = mysqli_query($mysqli,$sql);
$find = $_POST['name'];
while($row = mysqli_fetch_assoc($result)) {
	if ($row['Name'] == $find) {
		$copy = true;
	}
}







$name = $_POST['name'];
if (($name !== '') & !$copy ) {
	$Address = $_POST['Address'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];

	 echo "$name <br/>";
	 echo "$Address <br />";
	 echo "$phone <br />";
	 echo "$mail <br />";


	$result = mysqli_query($mysqli, "INSERT INTO `table_firm`(`Name`, `Address`, `Phone`, `email`) VALUES ('$name','$Address','$phone','$mail')");
	if ($result) {
	    echo "Данные успешно сохранены!";
	}
}
else {
    echo "Имя не должно быть пустым или повторяться. Может произошла ошибка подключения)";
} 


$mysqli->close();
?>