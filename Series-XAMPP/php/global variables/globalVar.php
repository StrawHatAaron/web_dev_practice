
<?php
$String = "global variables must be called with global alone in the function and it can be any type of varible";
$argue = "Aaron, ";
function abc($char){
global $String;
$thing = $char . ' ' . $String ;
echo $thing;

}

echo abc($argue);

?>