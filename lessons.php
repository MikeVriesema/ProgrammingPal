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
		
		<h2>My Lessons</h2>

	<!--
		======================================================================================================================
		LESSON SEARCH BY USER FORM + PHP +SQL
		TODO:a programmer ID (will find way of linking to the language ID through skills table)
		TODO:user email(must be registered (will do checks dw)))
		TODO:I'll suss out price because it can't be user specified (new table perhaps waheyy)
	-->
	<div id = "lessonFormSearch">
		<?php
			if( isset( $_POST['search'] ) ){ //CHECKS TO SEE IF DATA IS ENTERED
				do{
					$userEmail = $_POST['userEmail']; //SETS EMAIL INTO VARIABLE
					// Step 1: Connect to DBMS
					$conn = mysqli_connect("localhost", "root", "","ProgrammingPal") or die("Unable to connect to DBMS."); //ATTEMPTS DBMS CONNECTION OTHERWISE KILLS IT
					// Step 2: Write and run SQL command
					$sqlMailFetch = "SELECT userID FROM users WHERE email = '$userEmail'"; //PULLS USER ID FROM USERS USING INPUT EMAIL AS SQL QUERY
							$resultMail = $conn->query($sqlMailFetch); //RUNS QUERY AND STORES SQL RESULT IN RESULTMAIL
						while($row = $resultMail->fetch_assoc()){ //RUNS WHILE LOOP TO ITERATE THROUGH SQL RESULT
							$userIDEntry = $row["userID"]; //SETS USER ID AS VARIABLE
						}
					if($resultMail->num_rows > 0){ //IF THE RESULT OF USER ID IS GREATER THAN 0 IT RUNS THE NEXT SQL QUERY
						$sqlLessonFetch = "SELECT lessonID,programmerID,languageID,time,date,price FROM lessons WHERE userID = '$userIDEntry'";
							$resultLessons = $conn->query($sqlLessonFetch);
					}else{
						echo "<h4>No results found for email $userEmail.</h4>";
						break;
					}
					// Step 3: Process resulting data
					if($resultLessons->num_rows > 0){
						echo '<div id = returnedFormDiv>';
						echo '<table id="returnedForm">';
						echo "<table>";
						echo "Lesson Bookings: $userEmail";
						echo "<tr><th>LessonID</th><th>Programmer</th><th>Language</th><th>UserEmail</th><th>Time</th><th>Date</th><th>Price</th></tr>";
						while($row = $resultLessons->fetch_assoc())
						{
							$lessonID = $row["lessonID"];
							$programmerID = $row["programmerID"];
							$languageID = $row["languageID"];
							$time = $row["time"];
							$date = $row["date"];
							$price = $row["price"];

							$sql3 = "SELECT name FROM programmers WHERE programmerID = '$programmerID'";
								$resultProgram = $conn->query($sql3);
								while($row = $resultProgram->fetch_assoc()){
									$programmerName = $row["name"];
								}
							$sql4 = "SELECT language FROM languages WHERE languageID = '$languageID'";
								$resultLang = $conn->query($sql4);
								while($row = $resultLang->fetch_assoc()){
									$languageName = $row["language"];
								}
							echo "<tr><td>$lessonID</td><td>$programmerName</td><td>$languageName</td><td>$userEmail</td><td>$time</td><td>$date</td><td>€$price</td></tr>";
						}
						echo "</table>";
					} else 
					{
						echo "<h4>No results returned.</h4>";
						break;
					}
					$conn->close();
					break;

					echo '</div>';
				}while(0);
			}else{
		?>
		<form action ="lessons.php" method="POST" id="userLessonForm">
			<table id ='formUserID'>
				<tr>
					<td>	
						<b><label for="userEmail">Enter email:</label></b>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="userEmail" id="userEmail" tabindex="1" />
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
	</div>

	</div>

	<div id = "content2">
	
	<h2>Book A Lesson</h2>

	<!-- 
	===========================================================================================================================
	LESSON BOOKING FORM + PHP +SQL(NEEDS WORK BIG WIP)

		IMPORTANT CODE
	// Query for all the languages
	$queryLangs = mysql_query("SELECT languageID FROM languages");
	while($languages = mysql_fetch_array($queryLangs))
	{
	// Attach the language onto the $arraySkill array
	// We can do this because we know the languageID from the language table
	$arraySKill[$languages['personID']]['colours'][] = $colour;
	}
	-->
	<div id = "lessonFormBook">
	<form action ="lessons.php" method="POST" id="userLessonBook">
		<table id ='bookForm'>
			<tr>
				<td> <!-- JQUERY EVENT LISTENER FOR BUTTON PRESS WILL SOMEHOW REVEAL PROGRAMMERS FOR SELECTED LANGUAGE,WILL FIGURE OUT -->
					<b>Select a Language:</b>
					<br/>
						<?php
							$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
							$sqlLangFetch = "SELECT language FROM languages"; 
									$resultLangList = $conn->query($sqlLangFetch); 
							echo "<select name=language>";
							while($row = $resultLangList->fetch_assoc()){
								echo "<option id='language' value='" . $row['language'] ."'>" . $row['language'] ."</option>";
							}
							echo "</select>";
							$conn->close();
						?>
					<br/>
					<br/>
					<input type ="submit" name="checkLang" colspan ="2" id ="checkLang" value="Search Language" tabindex ="1"/>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						if( isset( $_POST['checkLang'] ) ){
							$bookLang = $_POST['language']; 
							$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
							$sqlProgrammerFetch = "SELECT name FROM programmers WHERE programmerID IN(SELECT programmerID FROM skills WHERE languageID IN(SELECT languageID FROM languages where language = '$bookLang'));"; 
										$resultProgrammerFetch = $conn->query($sqlProgrammerFetch); 
								echo "Select a programmer for the lesson in the language:<br/>$bookLang<br/>";
								echo "<select name=programmer>";
								while($row = $resultProgrammerFetch->fetch_assoc())
								{
									echo "<option id='programmer' value='" . $row['name'] ."'>" . $row['name'] ."</option>";
								}
								echo "</select>";	
							$conn->close();
						}
					?>
				</td>
			</tr>
			<tr>
				<td>	
					<b><label for="userEmail">Enter user email:</label></b>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="userEmail" id="userEmail" tabindex="2" />
				</td>	
			</tr>
			<tr>
				<td>	
					<br/>
					<input type ="submit" name="checkMail" colspan ="2" id ="checkMail" value="Continue" tabindex ="3"/>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						if( isset( $_POST['checkMail'] ) ){ //CHECKS TO SEE IF DATA IS ENTERED
							$checkMail = $_POST['userEmail'];
							$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
							$sqlMailCheck = "SELECT email FROM users WHERE email = '$checkMail'"; //REGISTERED EMAIL CHECK YEET
									$resultEmail = $conn->query($sqlMailCheck); 
							if($resultEmail->num_rows > 0){
								echo "JEFF YUS";
							}else{
								echo "JEFF NAH";
							}
							$conn->close();	
						}
					?>
				</td>
			</tr>
			<tr>
				<td>	
					<b><label for="date">Enter date of lesson:</b><i>YYYY-MM-DD</i></label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="date" id="date" tabindex="4" />
				</td>	
			</tr>
			<tr>
				<td>	
					<b><label for="time">Enter time of lesson:</b><i>HH:MM</i></label> 
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="time" id="time" tabindex="5" />
				</td>	
			</tr>
			<tr>
				<td>
					<br/>
					<input type ="reset" id ="reset" tabindex ="6" />
					<input type ="submit" name="book" colspan ="2" id ="search" tabindex ="7"/> 
				</td>
			</tr>
		</table>
	</form>
	</div>
		
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

<?php
			if( isset( $_POST['submit'] )){
				$username = $_POST['username'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$conn = mysqli_connect("localhost", "root", "", "PlanetExpress") or die("Unable to connect to DBMS.");
				$sql = "INSERT INTO users(username, email, address) VALUES('$username', '$email', '$address')";
				if ($conn->query($sql) === TRUE) {
					echo "User registered!";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}
		?>