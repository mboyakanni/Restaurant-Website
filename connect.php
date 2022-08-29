<html>
		<head>
			<title>PHP Form</title>
			<link rel="stylesheet" href="style.css" type="text/css">
			<link rel="stylesheet" href="form.css" type="text/css">
		</head>
<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	
	try 
	{
		$conn = new PDO("mysql:host=$host;dbname=test", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
	
	// FORM SUBMITTED DATA CAN ACCESSED BY:
	// 1. $_REQUEST : CAN BE USED FOR BOTH get AND post METHOD
	// 2. $_POST : CAN BE USED ONLY FOR post METHOD
	// 3. $_GET : CAN BE USED ONLY FOR get METHOD
	
	if(isset($_POST['submit']))
	{
		//print_r($_POST);
		$sql = "INSERT INTO test(name, number, email, food, textArea) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['number'])."', '".addslashes($_POST['email'])."', '".addslashes($_POST['food'])."', '".addslashes($_POST['textArea'])."')";
		$conn->query($sql);
	}
	
	?>
		<body>
		<section class="order" id="order">
        <div class="row">
        <form action="" method="post">
            <div class="inputBox">
            <input placeholder="Enter your name" type="text" name="name">
            </div><br>
			<div class="inputBox">
			<input type="email" placeholder="Enter your email" name="email">
			</div><br>

            <div class="inputBox">
            <input type="tel" placeholder="Enter your Phone Number" name="number">
            </div><br>
			<div class="inputBox">
			<input type="text" placeholder="Enter Name of food" name="food">
			</div><br>

            <textarea placeholder="Address" id="" cols="30" rows="10" name="textArea"></textarea><br><br>

            <input type="submit" value="order now" class="btn" name="submit">

        </form>
		</section>
		</body>
	</html>