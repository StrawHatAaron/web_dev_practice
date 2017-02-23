<?php include("includes/header.php"); ?>


<div style="margin-top:5%;">
	
	<form action="contact.php" method="post">
	<div class="ultimate-container">
		<label class="error" id="nameLabel">First Name</label>
		 <input type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" name="name" id="name" placeholder="First Name"/>
		<br/><br/>


		<label class="error">Last Name</label>
		<input type="text" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" name="lname" id="lname" placeholder="Last Name">
		<br/><br/>

		<label class="error">Email Adress</label>
		<input type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email" id="email" placeholder="Email">
		<br/><br/>

		<label class="error">Best phone number for contact</label>
		<input type="text" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" name="phone" id="phone" placeholder="Phone Number">
		<br/><br/>

		<label class="error">Zip Code</label> 
		<input type="text" value="<?php echo isset($_POST['zipCode']) ? $_POST['zipCode'] : ''; ?>" name="zipCode" id="zipCode" placeholder="Zip Code">
		<br/><br/>

		<label>Comment</label>
		<textarea  cols="30" rows="10" type="text" onkeyup="textCounter(this,'counter',300);" name="comment" id="comment">
		</textarea>
		<br/>
		<input value="<?php echo isset($_POST['counter']) ? $_POST['counter'] : ''; ?>" maxlength="10" size="10" value="300" id="counter" placeholder="Comments">
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


		<label class="error">Are you a home owner?</label>
		Yes<input type="radio" value="yes" name="resident" id="resident">
		No<input type="radio" value="no" name="resident" id="resident">
		<br/><br/>

		<label class="error">Are you a solar company?  </label>
		Yes<input type="radio" value="yes" name="business" id="business">
		No<input type="radio" value="no" name="business" id="business"> 
		<br/><br/>

		<!--<label for='uploaded_file'>Upload Your Electric Bill :</label>
		<div>
			<input name="MAX_FILE_SIZE" value="1024000" type="hidden">
			<input name="image" id="image" ENCTYPE="multipart/form-data" accept="image/jpg" type="file">
		</div>-->
		<br/><br/>
		
		<input type="submit" value="submit" href="contact.php">
	</div>
<div class="req-text"style="margin-left:50%; margin-top:-48%" ><h3>* Required field</h3></div>

<!--Bottom Navbar-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</body>

</html>
<?php include('includes/footer.php'); ?>

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

/*if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $_SESSION["name"] = $_POST["name"];
}else{
	$errors[] = "Please fill out your first name";
	$_SESSION["name"] = $_POST["name"];
}*/

if (empty($_POST['name'])){
	$errors[] =  "Please fill out your first name";
}else{
	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$_SESSION["name"] = $_POST["name"];
}
if (empty($_POST['lname'])){
	$errors[] =  "Please fill out your last name";
}else{
	$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$_SESSION["lname"] = $_POST["lname"];
}
if (empty($_POST['email'])){
	$errors[] = "Please fill out your email";
}else{
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$_SESSION["email"] = $_POST["email"];
}
if (empty($_POST['zipCode'])){
	$errors[] = "Please fill out your zip code";
}else{
	$zipCode = mysqli_real_escape_string($conn, $_POST["zipCode"]);
	$_SESSION["zipCode"] = $_POST["zipCode"];
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
	$_SESSION["counter"] = $_POST["comment"];
}
if(empty($_POST['phone'])){
	$errors[] =  "Please enter your phone number";
}
else{
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$_SESSION["phone"] = $_POST["phone"];
}
$num = 0;
?>


<div style="margin-top:-40%;"></div>

<div style="margin-left: 45%; float: top;">
<?php
	foreach ($errors as $error) {
		echo $error . '<br><br>';
		$num++;
	}
?>
</div>
<?php

if($num > 0){
	die();
}


//Notice: Undefined variable: image in /Applications/XAMPP/xamppfiles/htdocs/series/LearningphpMyAdmin/index.php on line 170

$sql = "INSERT INTO db (name, lname, email, zipCode, resident, business, comment, phone, id) VALUES ('$name','$lname','$email','$zipCode','$value','$value1','$comment','$phone', '')";
?><div style="margin-left:35%;margin-bottom:10%; font-size: 24pt;"> 
<?php
if($conn->query($sql) === TRUE){
	echo "Record Added Sucessfully";
	?><div>
	<?php
}

else
{
	echo "Error" . $sql . "<br/>" . $conn->error;
}
$conn->close();


?>
