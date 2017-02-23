<?php
 
 function MyName(){

	echo "aaron milla <br>";
}

	echo "My name is <br>";
	MyName();


$int1 = 642;
$int2 = 538;
//function with arguemeents
	function subtract($value1, $value2)
	{
		echo $value1 - $value2  . "<br>";
	}
	subtract($int1, $int2);

function DisplayDate($month, $day, $year){

	echo $month . ' ' . $day . ' ' . $year . "<br>";

} 
	DisplayDate("feb", 18, 2016);


function add($val1, $val2){

	$result = $val1 + $val2;
	return $result;

}
	echo add(10, 10) + 100;

function divide($val1, $val2){

	$result = $val1 / $val2;
	return $result;

}

$sum =  divide(add(10, 20), add(1, 2));

echo "<br>".$sum;

?>