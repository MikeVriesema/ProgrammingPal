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
		
		<h2>Lessons</h2>
		
		
		
		
	

	<!--
		=======================================================================================================================
		LESSON DATA RETRIEVAL BASED ON USER ID INPUT(BEING WORKED ON SLOWLY)
		WILL HAVE MOST OF THE BIG DATABASE PULLING HERE(WAHEYYY)
		THERE SHOULD BE AN EQUIVALENT FORM TO LET YOU PUT IN THE FOLLOWING DETAILS AS A USER:
		languageID for now (will become language from drop down[recycle from programmer sign up])
		a programmer ID (will find way of linking to the language ID through skills table)
		userID for now (willconvert to user email(must be registered (will do checks dw)))
		date idk tbh,it auto fills it if nothing is put in so up to you for now
		that's all,I'll suss out price because it can't be user specified (new table perhaps waheyy)
		


	-->
	
	<?php

	echo '<link rel="stylesheet" type="text/css" href="formStyle.css">';
	if( isset( $_POST['search'] ) )
	{
	$emailEntry = $_POST['userID'];
	// Step 1: Connect to DBMS
	$conn = mysqli_connect("localhost", "root", "","ProgrammingPal") or die("Unable to connect to DBMS.");
	// Step 2: Write and run SQL command
	//$sql = "SELECT userID FROM users WHERE email = '$emailEntry' LIMIT 1";
	//	$runUserID = $conn->query($sql);
	$sql = "SELECT * FROM lessons WHERE userID = '$emailEntry'";
			$result = $conn->query($sql);
	
	// Step 3: Process resulting data
		if($result->num_rows > 0) 
		{
			echo '<div id = returnedFormDiv>';
			echo '<table id="returnedForm">';
			echo "<h1>Lesson Bookings:</h1>";
			echo "<tr><th>LessonID</th><th>ProgrammerID</th><th>LanguageID</th><th>UserID</th><th>Date</th><th>Price</th></tr>";
			while($row = $result->fetch_assoc())
			{
				$lessonID = $row["lessonID"];
				$programmerID = $row["programmerID"];
				$languageID = $row["languageID"];
				$userID = $row["userID"];
				$date = $row["date"];
				$price = $row["price"];
				
				echo "<tr><td>$lessonID</td><td>$programmerID</td><td>$languageID</td><td>$userID</td><td>$date</td><td>€$price</td></tr>";
			}
			echo "</table>";

			
		} 
		else 
		{
			echo "<h4>No results returned.</h4>";
		}
		$conn->close();

		echo '</div>';
		
	}else{
	?>
	<form action ="lessons.php" method="POST" id="userLessonForm">
			<table id ='formUserID'>
				<tr>
					<td>	
						<b><label for="userID">Enter UserID:</label></b> <!-- USE 3 TO TEST -->
					</td>
					<td>
						<input type="text" name="userID" id="userID" tabindex="1" />
					</td>	
				</tr>
				<tr>
				<td>
				<br/>
					<input type ="reset" id ="reset" tabindex ="2" />
					<input type ="submit" name="search" colspan ="2" id ="search" tabindex ="3"/>
				</td>
				</tr>
			</table>
			</form>
	<?php
	}
	?>
	<!-- 
		===========================================================================================================================
		-->
		</div>

		<div id = "content2">
		
		<h2>Lessons</h2>
		
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

