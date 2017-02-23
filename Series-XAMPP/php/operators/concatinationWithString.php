<?php 
$number = 12;

if ($number == 10)
{
	echo "number equals 10 ";
}
else if ($number == 11)
{
	echo "number equals 11";
}
else 
	echo "$number is not equal to 10 or 11";

$number *= 5;
	echo "<br> $number";
$number /= 13;
	echo "<br> $number";

	//text can be concattonated on
	$text = "<br>how to fix broken elevator shaft:";
	$text .= "weld the shaft back to the frame ";
		echo "$text";
?>