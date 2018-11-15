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
			<form method="POST" action ="mailto:17184614@studentmail.ul.ie" id="mainForm">
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
				
			
		
			
				<td>
				<br/>
					<input type ="reset" id ="reset" tabindex ="10" />
					<input type ="submit" colspan ="2" id ="submit" tabindex ="11"/>
				
				</td>
			</table>
		</form>

		
	</div>
			
	<?php
	/*DROP DOWN FROM DB IN PHP,NEEDS WORK
	// Step 1: Connect to DBMS
	// mysql -u root -p
	$conn = mysql_connect("localhost", "root", "") or die("Unable to connect to DBMS.");

	// Step 2: Select Database
	// USE ProgrammingPal;
	$db = mysql_select_db("ProgrammingPal", $conn) or die("Unable to connect to DB.");
	
	
	// Step 3: Write and run SQL command
	$sql = "SELECT language FROM languages";
	$resultLang = mysql_query($sql);
	
	
	// Step 4: Process resulting data
	
	echo "<p>See which programming languages we provide assistance with!</p>";
	echo "<select name=Programming Languages>";
	if(mysql_num_rows($resultLang) > 0)
	{
		while($row = mysql_fetch_array($resultLang))
		{
			echo "<option value='" . $row['language'] ."'>" . $row['language'] ."</option>";
		}
		
	} 
	else 
	{
		echo "<h2>No results returned.</h2>";
	}
	echo "</select>";
	$conn->close();*/
	?>
	
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

