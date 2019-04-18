<?php

$find = $_POST['find'];
function findword($company){

	$f = fopen("companies.csv", "r");
	$res = false;
	    while (($row = fgetcsv($f, 1000, ";")) !== FALSE) {
	    	
	    		
	        if ($row[0] == $company) {
	            $res = $row[0];
	            for ($i=0; $i < 4 ; $i++) { 
	            	# code...
	            
	            echo "$row[$i]<br />\n";
	        }
	            

	            break;
	        }
	    }
	    fclose($f);
	return $res;
}
if (findword($find)){
	echo "good";

}

?>