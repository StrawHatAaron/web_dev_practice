<?php 
$string = 'this is a string ';
//         part of varibal to find then the variable 
if (preg_match('/ /' , $string)) {
	echo "match found";
}
else {

	echo "match not found";
}

?>