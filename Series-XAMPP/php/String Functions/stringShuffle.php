<?php

$string = "here is a example of a string wrote feb 18 2016";
$string_shuffle = str_shuffle ($string);
$half = substr($string_shuffle, 0, strlen($string)/2);

echo $string_shuffle;

echo "<br>";

echo $half;
?>