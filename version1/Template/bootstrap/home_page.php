<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to TechnoPedia</title>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="style.css">
		 
	<?php
	function aixx(){
	$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
		or die("Couldn't connect to database.");

		$db = mysql_select_db("technopedia2", $dbh) 
		or die("Couldn't select database.");
		
		$sql= 'SELECT * FROM Staff';
		$result = mysql_query($sql) 
		or die("Something is wrong with your SQL statement.");
		
		while ($row = mysql_fetch_array($result)) {
		$name=$row['FirstName'];
		echo $name;
		echo '\n';
		}

		
		mysql_close($dbh);

	}
	
	if($_GET['hello']){
		aixx();
	}
	?>
	</head>

<body>
	
	
		
	<div class="container" style="height:auto">
		<div class="top">
			<h1 id="title" class="hidden">Welcome To TechnoPedia!</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password">
			<br/>
			<a href='home_page.php?hello=true'  type="submit" class="button">Sign In</a>
			</div>
			<br/>
			<br/>						
	</div>
</body>
</html>