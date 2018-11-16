<!DOCTYPE html>

<html>
	<head>
		<title>Programming Pal</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="indexStyle.css">
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
		
		<h2>Why Choose Us?</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a pulvinar lectus. Vestibulum pellentesque, ligula in laoreet iaculis, purus nibh laoreet enim, in tempor felis risus ut ex. Vestibulum id venenatis ligula. Integer pellentesque mauris sit amet neque imperdiet tempor. Vivamus interdum semper sapien, et vestibulum sem finibus nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sapien nibh, laoreet mollis augue vitae, tempus sagittis risus. Etiam in nisi rhoncus, dapibus dolor sed, accumsan elit. Nam tortor nibh, tincidunt a aliquam non, vestibulum eu arcu. Phasellus orci turpis, vestibulum consectetur vestibulum eget, elementum maximus justo. Phasellus tempus ligula nec lorem laoreet, eget sollicitudin orci interdum. Fusce nec viverra dui. Sed congue nunc a consectetur auctor. Donec tempus rhoncus eros. Duis eu rutrum dui. Suspendisse justo dolor, suscipit eu vulputate ac, elementum ac massa.</p>

		<ul>
			<li>Java</li>
			<li>C</li>
			<li>Php</li>
			<li>HTML</li>
		</ul>

		<p>Nunc ipsum arcu, mollis sit amet nulla in, interdum fringilla lectus. Curabitur laoreet, dui sed dapibus egestas, mauris urna suscipit sem, quis ullamcorper nisi lorem in nisi. Mauris vel lorem luctus, tempus massa eu, vestibulum ipsum. Sed auctor tincidunt libero a consequat. Quisque elementum nec nunc vel malesuada. Nullam tellus lacus, tincidunt sed pulvinar at, pellentesque et sapien. Duis quis urna eget sem congue sodales. Ut suscipit ante vel nulla efficitur, ut viverra erat aliquam. Sed sagittis ultricies dictum. Aliquam nec pretium est, vel interdum libero. Mauris luctus enim et condimentum scelerisque. Nulla fringilla arcu sit amet sem vulputate aliquam.</p>
		
		<p>unc ipsum arcu, mollis sit amet nulla in, interdum fringilla lectus. Curabitur laoreet, Nullam tellus lacus, tincidunt sed pulvinar at, pellentesque et sapien. Duis quis urna eget sem congue sodales. Ut suscipit ante vel nulla efficitur, ut viverra erat aliquam. Sed sagittis ultricies dictum. Aliquam nec pretium est, vel interdum libero. Mauris luctus enim et condimentum scelerisque. Nulla fringilla arcu sit amet sem vulputate aliquam. Duis quis urna eget sem congue sodales.</p>
		
		</div>
		
		<div id = "content2">
		
		<h2>Picture of things</h2>
		<img src="images/code.jpg" title="Code" width="780" height="400"  alt="Code"></img>

		
		<p>Sed eget aliquet eros. Morbi condimentum scelerisque pharetra. Mauris id lectus a odio efficitur malesuada. Integer est ex, ultricies sit amet suscipit eget, pulvinar ut leo. Aliquam erat volutpat. Nullam pellentesque fringilla pellentesque. Etiam iaculis felis quis efficitur ultricies. Nunc ac tellus tellus. Cras ultricies nibh elit, convallis euismod turpis pellentesque ac. Donec non nunc dui. Aliquam erat volutpat. Morbi luctus tristique magna, quis bibendum eros ornare sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In id rutrum tortor, vestibulum placerat lectus.</p>

		<p>Nunc ipsum arcu, mollis sit amet nulla in, interdum fringilla lectus. Curabitur laoreet, dui sed dapibus egestas, mauris urna suscipit sem, quis ullamcorper nisi lorem in nisi. Mauris vel lorem luctus, tempus massa eu, vestibulum ipsum. Sed auctor tincidunt libero a consequat. Quisque elementum nec nunc vel malesuada. Nullam tellus lacus, tincidunt sed pulvinar at, pellentesque et sapien. Duis quis urna eget sem congue sodales. Ut suscipit ante vel nulla efficitur, ut viverra erat aliquam. Sed sagittis ultricies dictum. Aliquam nec pretium est, vel interdum libero. Mauris luctus enim et condimentum scelerisque. Nulla fringilla arcu sit amet sem vulputate aliquam.</p>
	

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
			echo "<table>";
			echo "Lesson Bookings:";
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

