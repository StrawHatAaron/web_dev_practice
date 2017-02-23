<html>
<form action = ' upload.php' method = 'POST' enctype="multipart/form-data">

<form/>
<?php

$string = 'this is an the most awesomest awesome string in the world!';
$picture = '<img src ="monkey.gif>"';
$string_trimmed = trim($string);

echo $string;

$string1 = "this is a string";
$string_addslashes = addslashes($string1);

echo $string_addslashes;
?>
</html>