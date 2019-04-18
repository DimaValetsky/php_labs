<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<div>
<?php
if(isset($_POST['name']) && isset($_POST['msg'])){
	$reg = '#(https?://)?(www\.)?(bsuir\.by(*SKIP)(*F)|[a-z0-9]+(\.[a-z0-9_-]+)*\.([a-z]){2,5}(/[/a-z0-9_-]+)?)#i';

    $name=$_POST['name'];
    $msg = preg_replace($reg, '#Внешние ссылки запрещены!', $_POST['msg']);
    $handle = fopen("f.txt", "a+");
    fwrite($handle, "$name". PHP_EOL ."$msg" . PHP_EOL);
   	
   
    fclose($handle);
    $handle = fopen("f.txt", "r");
    while ( ($out = fgets($handle)) !== false) {
   		echo "$out"."<br />\n";
   	}
   	fclose($handle);
  
}
?>
</div>
<h3>Отзывы</h3>
<form method="POST">
    Имя: <input type="text" name="name" /><br><br>
    Сообщение: <input type="text" name="msg" /><br><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>
  