<?php
$string = "elevator";
$number = 10;
$week = 'saturday';

switch ($string) {
	case "elevator":
		echo "elevator<br>";
		
		break;
	case "Elevators":
		echo "<br>this is not picky with lower or upper case numbers";
	
		break;
}

	
	switch ($number) {
		case 1:
			echo "one";
			break;
		case 2:
			echo "two";
			break;
		case 3:
			echo "three";
			break;
		default:
			echo"number not found.";
			break;
		}

	switch ($week) {
				case 'saturday':
				case 'sunday';
					echo'<br> it\'s the weekend!';
					break;
				
				default:
					echo("its the weekday...");
					break;
			}		
	


?>