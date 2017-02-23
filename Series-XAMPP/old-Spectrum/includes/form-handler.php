<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "Spectrum Solar";

//Creating connection for mysqli

$conn = new mysqli($server, $user, $pass, $dbname);

//Checking connection
$_GET['display_blob'] = true;
$errors = array();


if (empty($_POST['name'])){
	$errors[] = "Please fill out your first name";
}else{
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
}
if (empty($_POST['lname'])){
	$errors[] =  "Please fill out your last name";
}else{
	$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
}
if (empty($_POST['email'])){
	$errors[] = "Please fill out your email";
}else{
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
}
if (empty($_POST['zipCode'])){
	$errors[] = "Please fill out your zip code";
}else{
	$zipCode = mysqli_real_escape_string($conn, $_POST["zipCode"]);
}

if (empty($_POST['resident'])){
	$errors[] = "Please declare if you own property";
}else{
	$resident = intval($_POST["resident"]);
	if ($_POST['resident'] == 'no') {
		$value = 0;
	} elseif ($_POST['resident'] == 'yes') {
		$value = 1;
	}
}
if (empty($_POST['business'])){
	$errors[] = "Please declare if you are a solar company";
}else{
	$business = intval($_POST["business"]);
	if ($_POST['business'] == 'no') {
		$value1 = 0;
	} elseif ($_POST['business'] == 'yes') {
		$value1 = 1;
	}
}
if(empty($_POST['comment'])){
}else{
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
}
if(empty($_POST['phone'])){
	$errors[] =  "Please enter your phone number";
}
else{
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
}

if (isset($_FILES['image']) && $_FILES['image']['size'] > 0){
	$tmpName = $_FILES['image']['tmp_name'];
	$fp = fopen($tmpName, 'r');
	$image = fread($fp, filesize($tmpName));
	$image = addslashes($data);
	fclose($fp);
}
else {
	$image = 0;
}

$num = 0;
?>

<div style="margin-top:-50%; margin-left: 15%; float: right;"></div>
<?php


?>
<pre >
<?php
	foreach ($errors as $error) {
		printr($error);
		$num++;
	}
?>
</pre>
<?php

if($num > 0){
	die();
}

//Notice: Undefined variable: image in /Applications/XAMPP/xamppfiles/htdocs/series/LearningphpMyAdmin/index.php on line 170

$sql = "INSERT INTO db (name, lname, email, zipCode, resident, business, comment, phone, image, id) VALUES ('$name','$lname','$email','$zipCode','$value','$value1','$comment','$phone', '$image', '')";

if($conn->query($sql) === TRUE){
	echo "Record Added Sucessfully";
}
else
{
	echo "Error" . $sql . "<br/>" . $conn->error;
}
$conn->close();

?>