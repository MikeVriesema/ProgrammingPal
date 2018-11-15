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
			<a href = "#">Contact Us</a>
		</nav>	

		<div id = "content">
		
			<h2>Student Registration</h2>

			

		<?php
		if( isset( $_POST['submit'] ) )
		{
			$name = $_POST['name'];
            $email = $_POST['email'];
			// Step 1: Connect to DBMS
			// mysql -u root -p
			$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS.");
			// Step 2: Write and run SQL command
			//$sql = "INSERT INTO users(username, email) VALUES('".$_POST["name"]."', '".$_POST["email"]."')";
			$sql = "INSERT INTO users(username, email) VALUES('$name', '$email')";
			//mysqli_query($con,"INSERT INTO users(username, email) VALUES('$name', '$email')");
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			// Step 3: Process resulting data
		}else{
		?>
		<form action ="studentForm.php" method="POST" id="mainForm">
			<table id ='formTable'>
				<tr>
					<td>	
							
						<b><label for="name">Name:</label></b>
					</td>
					<td>
						<input type="text" name="name" id="name" tabindex="1" />
					</td>	
				</tr>

				<tr>
				<td>		
					<b><label for="email">Email:</label></b>
					</td>
					<td>
						<input type="text" name="email" id="email" tabindex="2" />
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
		
		<h2></h2>
	
		
		<p>Sed eget aliquet eros. Morbi condimentum scelerisque pharetra. Mauris id lectus a odio efficitur malesuada. Integer est ex, ultricies sit amet suscipit eget, pulvinar ut leo. Aliquam erat volutpat. Nullam pellentesque fringilla pellentesque. Etiam iaculis felis quis efficitur ultricies. Nunc ac tellus tellus. Cras ultricies nibh elit, convallis euismod turpis pellentesque ac. Donec non nunc dui. Aliquam erat volutpat. Morbi luctus tristique magna, quis bibendum eros ornare sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id rutrum tortor, vestibulum placerat lectus.</p>

		<p>Nunc ipsum arcu, mollis sit amet nulla in, interdum fringilla lectus. Curabitur laoreet, dui sed dapibus egestas, mauris urna suscipit sem, quis ullamcorper nisi lorem in nisi. Mauris vel lorem luctus, tempus massa eu, vestibulum ipsum. Sed auctor tincidunt libero a consequat. Quisque elementum nec nunc vel malesuada. Nullam tellus lacus, tincidunt sed pulvinar at, pellentesque et sapien. Duis quis urna eget sem congue sodales. Ut suscipit ante vel nulla efficitur, ut viverra erat aliquam. Sed sagittis ultricies dictum. Aliquam nec pretium est, vel interdum libero. Mauris luctus enim et condimentum scelerisque. Nulla fringilla arcu sit amet sem vulputate aliquam.</p>
	
		
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
		
			<a href = "#">| Testimonials |</a>
			<a href = "#">| Contact Us |</a>
		</div>

			
		</body>	
	</div>
</html>