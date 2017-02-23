<html>
	<head>
			<title>Spectrum Solar Consulting</title>
	</head>
	<body>
		<form action="image.php" method="post">

<label style="margin-left:9.2%;">Customer id</label>
<input type="text" name="id" id="id">
<br/><br/>

<input type="submit" value="Submit" href="afterForm.html">
<br/><br/>
	</body>
</html>

<?php 

$db = mysqli_connect("localhost","root","","Spectrum Solar"); //keep your db name
if(empty($_POST['id'])){
		$errors[] =  "Please enter the Customer id number";
	}
	else{
		$id = mysqli_real_escape_string($conn, $_POST['id']);
	}
$retrieve = $db->get_row("SELECT image FROM db WHERE id = $id");

$image = imagejpeg(imagecreatefromstring(base64_decode($retrieve->image)));



?>