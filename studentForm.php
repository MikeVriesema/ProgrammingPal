<!DOCTYPE html>

<html>
	<head>
		<title>Programming Pal</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="formStyle.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
		
	</head>

	<div id ="container">
		<body>
			
		<div id = "header">
			<h1>Programming Pal
			<sub>(Destroying our souls so you don't have to)</sub></h1>	
		</div>
		
		<nav>
			<a href = "index.php">Home</a>
			<a href = "form.php">Programmers</a>
			<a href = "lessons.php">Lessons</a>
			<a href = "studentForm.php">Students</a>
			<a href = "contact.php">Contact Us</a>
		</nav>	

		<div id = "content">
		
			<h2>Student Registration</h2>

			

		<?php
			if( isset( $_POST['submit'] )){
				$name = $_POST['name'];
				$email = $_POST['email'];
				$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS.");
				$sqlRegisterUser = "INSERT INTO users(username, email) VALUES('$name', '$email')";
				if ($conn->query($sqlRegisterUser) === TRUE) {
					echo "<h4>User Registered</h4>";
				} else {
					echo "Error: " . $sqlRegisterUser . "<br>" . $conn->error;
				}
				$conn->close();
			}else{
		?>
		<form action ="studentForm.php" method="POST" id="mainForm">
			<table id ='formTable'>
				<tr>
					<td>	
							
						<b><label for="name">Name:</label></b>
					</td>
					<td>
						<input type="text" name="name" id="name" tabindex="1" required/>
					</td>	
				</tr>

				<tr>
				<td>		
					<b><label for="email">Email:</label></b>
					</td>
					<td>
						<input type="email" name="email" id="email" tabindex="2" required/>
					</td>
				</tr>

				<td>
				<br/>
					<input type ="reset" id ="reset" tabindex ="3" />
					<input type ="submit" name="submit" colspan ="2" id ="submit" tabindex ="4"/>
				
				</td>
			</table>
			</form>
			<?php
				}
			?>
	</div>

	
	<div id = "content2" class = "contentClass">
		
		<h2>Testimonials</h2>
	
		<img src="images/james.jpg" title="James"  alt="James">

		<p>Our service is directed towards everyone and anyone with any level of programming experience. If you are just starting trying to find your feet in your first programming language we're here to help.<br/> Even the programming wizards who are looking to advance knowledge in an area or work on a new project. We're here to suit everyone. We also plan on launching a new service soon where we plan on building platforms, services and applications that people can hire us to develop.</p>

		<p>Sample projects that our team have worked on: 
				
					<b><br/>-A League Management System-</b>
					<b><br/>-Playlist and Track music environment-</b>
					<b><br/>-Community Centre Booking System-</b>
					<b><br/>-Local Sports Team Website-</b>
					<b><br/>-Polynomial Manipulation Application-</b>
					<b><br/>-A Guitar Chord Shape/Sound Searcher-</b>
					<b><br/>-Monoalphabetic Cipher Encryption/Decryption Application-</b>
					<b><br/>-2D & 3D Shapes Application-</b>
					<b><br/>-And Many More...-</b>
			
		</p>
	</div>
	

	

		
		
		<div class = "clear"></div>
		<div id = "footer">
			<p>Programming Pal,</p>
			<p>123 UL Street,</p>
			<p>Co. Limerick</p>
			<a href="mailto:programming4life@programmingpal.com" target="_top">Send us an email!</a>
			
			<br/>
			<br/>
			<a href = "index.php">| Home |</a>
			
			<a href = "form.php">| Register |</a>
			
			<a href = "lessons.php">| Lessons |</a>
		
			<a href = "contact.php">| Contact Us |</a>
		</div>

			
		</body>	
	</div>
</html>
