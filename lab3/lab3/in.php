<?php

function findword($company){

	$f = fopen("companies.csv", "r");
	$res = false;
	    while (($row = fgetcsv($f, 1000, ";")) !== FALSE) {
	    	
	    		
	        if ($row[0] == $company) {
	            $res = $row[0];
	            
	            break;
	        }
	    }
	    fclose($f);
	return $res;
}

$array = array($_POST['name'].";", $_POST['address'].";", $_POST['phone'].";", $_POST['mail'].";");
if (($_POST['name'] !== '') & !findword($_POST['name']))
{ 
	
	$handle = fopen("companies.csv","a");
	
		fputcsv($handle, $array, $delimiter = " ");
	
	
	fclose($handle);
	echo "Записано успешно!";
 }
else{
	echo "Имя компании должно быть заполнено или быть новым!";
}
?>