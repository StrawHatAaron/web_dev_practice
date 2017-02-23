<?php
$number1 = 500;
$number2 = 754;
$number3 = 1000;

if ($number1 <= $number2 && $number2 <= $number3) {
	echo"ok";
}

//says if statement one isnt true or statment two inst true then perform code
if (!$number1 == $number2 ||! $number2 == $number3) {
	echo"<br> double ok (number1 doesnt equal with number2 or number3";
}
?>