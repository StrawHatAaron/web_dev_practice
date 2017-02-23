<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<meta charset="UTF-8">
<title>Insert Data</title>
</head>
<body>




<p style="margin-left:7.8%;"><span class="error">* Required field</span></p>

 
<form action="index.php" method="post">

<label style="margin-left:9.2%;"><span class="error">* </span>First Name</label>
<input type="text" name="name" id="name">
<br/><br/>


<label style="margin-left:9.3%;"><span class="error">* </span>Last Name</label>
<input type="text" name="lname" id="lname">
<br/><br/>

<label style="margin-left:8.1%;"><span class="error">* </span>Email Adress</label>
<input type="text" name="email" id="email">
<br/><br/>

<label style="margin-left:.3%;"><span class="error">* </span>Best phone number for contact</label>
<input type="text" name="phone" id="phone">
<br/><br/>

<label  style="margin-left:10%"><span class="error">* </span>Zip Code</label> 
<input type="text" name="zipCode" id="zipCode">
<br/><br/>

<label style="margin-left:5.4%;">Comment</label>
<textarea cols="30" rows="10" type="text" onkeyup="textCounter(this,'counter',300);" name="comment" id="comment">
</textarea>
<br/>
<input style="margin-left:10.2%;" maxlength="10" size="10" value="300" id="counter">
<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script><br/><br/>


<label style="margin-left:6.7%;"><span class="error">* </span>Are you a home owner?</label>
Yes<input type="radio" value="yes" name="resident" id="resident">
No<input type="radio" value="no" name="resident" id="resident">
<br/><br/>

<label style="margin-left:5.65%;"><span class="error">* </span>Are you a solar company?  </label>
Yes<input type="radio" value="yes" name="business" id="business">
No<input type="radio" value="no" name="business" id="business"> 
<br/><br/>

<label style="margin-left:1%;" for='uploaded_file'>Upload Your Electric Bill :</label>
<input name="MAX_FILE_SIZE" value="1024000" type="hidden">
<input name="image" id="image" ENCTYPE="multipart/form-data" accept="image/jpg" type="file">
<br/><br/>


<input type="submit" value="Submit" href="afterForm.html">
<br/><br/>

</body>
</html>


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
	foreach ($errors as $error){
		echo $error ;?> <br/><br/><?php
		$num = $num + 1;
	}

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