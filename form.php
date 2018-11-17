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
		
		<h2>Programmer Registration!</h2>
		<?php
		if( isset( $_POST['submit'] ) ){ //CHECKS TO SEE IF DATA IS ENTERED
			$progName = $_POST['name'];
			$progEmail = $_POST['email'];
			$progLangs = $_POST['email']; 
		}else{
		?>
			<form method="POST" action ="form.php" id="mainForm">
			<table id ='formTable'>
				<tr>
					<td>	
							
						<b><label for="name">Name:</label></b>
					</td>
					<td>
						<input type="text" name="name" id="" tabindex="1" />
					</td>	
				</tr>

				<tr>
				<td>		
					<b><label for="email">Email:</label></b>
					</td>
					<td>
						<input type="text" name="email" id="" tabindex="2" />
					</td>
				</tr>
				<tr>
					<td>
						<b>Select a Language:</b>
						<br/>
							<?php
							//DROP DOWN FROM DB IN PHP,NEEDS WORK
							// Step 1: Connect to DBMS
							$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
							// Step 2: Write and run SQL command
							$sql2 = "SELECT language FROM languages"; 
									$resultLangList = $conn->query($sql2); 
							// Step 4: Process resulting data
							
							echo "<select name=language>"; //YES I WILL CONVERT THIS TO MULTI SELECTION RADIO BUTTONS AND FEED IN A LIST OF LANGUAGES JUST LEAVE IT LIKE THIS FOR NOW xx
							if($resultLangList->num_rows > 0)
							{
								while($row = $resultLangList->fetch_assoc())
								{
									echo "<option id='language' value='" . $row['language'] ."'>" . $row['language'] ."</option>";
								}
							} 
							else 
							{
								echo "<h2>No results returned.</h2>";
							}
							echo "</select>";
							$conn->close();
							?>
					</td>
				</tr>
				
		
			
				<td>
				<br/>
					<input type ="reset" id ="reset" tabindex ="10" />
					<input type ="submit" name = "submit" colspan ="2" id ="submit" tabindex ="11"/>
				
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

