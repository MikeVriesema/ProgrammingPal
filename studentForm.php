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
					echo "User registered!";
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

	
	<div id = "content2">
		
		<h2>Testimonials</h2>
	
		<img src="images/james.jpg" title="James"  alt="James">

		<p>Sed eget aliquet eros. Morbi condimentum scelerisque pharetra. Mauris id lectus a odio efficitur malesuada. Integer est ex, ultricies sit amet suscipit eget, pulvinar ut leo. Aliquam erat volutpat. Nullam pellentesque fringilla pellentesque. Etiam iaculis felis quis efficitur ultricies. Nunc ac tellus tellus. Cras ultricies nibh elit, convallis euismod turpis pellentesque ac. Donec non nunc dui. Aliquam erat volutpat. Morbi luctus tristique magna, quis bibendum eros ornare sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id rutrum tortor, vestibulum placerat lectus.</p>

				
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