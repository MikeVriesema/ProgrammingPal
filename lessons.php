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
		
		<h2>My Lessons</h2>

	<div id = "lessonFormSearch">
		<?php
			if( isset( $_POST['search'] ) ){ //CHECKS TO SEE IF DATA IS ENTERED
				do{
					$userEmail = $_POST['userEmail']; //SETS EMAIL INTO VARIABLE
					$total=0;
					$conn = mysqli_connect("localhost", "root", "","ProgrammingPal") or die("Unable to connect to DBMS."); //ATTEMPTS DBMS CONNECTION OTHERWISE KILLS IT
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
					if($resultLessons->num_rows > 0){
						echo '<div id = returnedFormDiv>';
						echo '<table id="returnedForm">';
						echo "<h2>Lesson Bookings: $userEmail</h2>";
						echo "<tr><th>LessonID</th><th>Programmer</th><th>Language</th><th>UserEmail</th><th>Time</th><th>Date</th><th>Price</th></tr>";
						while($row = $resultLessons->fetch_assoc())
						{
							$lessonID = $row["lessonID"];
							$programmerID = $row["programmerID"];
							$languageID = $row["languageID"];
							$time = $row["time"];
							$date = $row["date"];
							$price = $row["price"];
							$total = $total+$price;
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
						echo "<br/>Total Cost: €$total"; //HELP
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
						<input type="email" name="userEmail" id="userEmail" tabindex="1" required />
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
	</div>
	
	<div id = "content2">
	
	<h2>Book A Lesson</h2>
	<div id = "lessonFormBook">
		<?php
			if( isset( $_POST['checkLang'] ) ){
				$selectedLang = $_POST['language']; 
				echo "$selectedLang";
			}
			if( isset( $_POST['bookLesson'] ) ){ //CHECKS TO SEE IF DATA IS ENTERED
				$checkMail = $_POST['userEmail'];
				$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
				$sqlMailCheck = "SELECT userID FROM users WHERE email = '$checkMail'"; //REGISTERED EMAIL CHECK AND RETURNS USERID
						$resultEmail = $conn->query($sqlMailCheck); 
				if($resultEmail->num_rows > 0){
					while($row = $resultEmail->fetch_assoc()){
						$userID = $row["userID"];
					}
					$progName = $_POST['programmer'];
					$langName = $_POST['language'];
					$time = $_POST['time'];
					$date = $_POST['date'];

					$sql3 = "SELECT programmerID FROM programmers WHERE name = '$progName'";
						$resultProgram = $conn->query($sql3);
						while($row = $resultProgram->fetch_assoc()){
							$progID = $row["programmerID"];
						}
					$sql4 = "SELECT languageID FROM languages WHERE language = '$langName'";
						$resultLang = $conn->query($sql4);
						while($row = $resultLang->fetch_assoc()){
							$langID = $row["languageID"];
						}
					$bookLesson = "INSERT INTO lessons(programmerID, languageID, userID, time, date, price) VALUES($progID, $langID, $userID, '$time', '$date', 15.00);";
					if($conn->query($bookLesson)===TRUE){
						echo "<h2>Lesson Booked</h2>";
					} else {
						echo "Error: " . $bookLesson . "<br>" . $conn->error;
					}
				}else{
					echo "<h4>No registered email found.</h4>";
				}
				$conn->close();	
			}else{
			
		?>
	<form action ="lessons.php" method="POST" id="userLessonBook">
		<table id ='bookForm'>
			<tr>
				<td> <!-- JQUERY EVENT LISTENER FOR BUTTON PRESS WILL SOMEHOW REVEAL PROGRAMMERS FOR SELECTED LANGUAGE,WILL FIGURE OUT -->
					<b>Select a Language:</b>
					<br/>
						<?php
							if( isset( $_POST['checkLang'] ) ){
								$selectedLang = $_POST['language']; 
							}
							$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
							$sqlLangFetch = "SELECT language FROM languages"; 
									$resultLangList = $conn->query($sqlLangFetch); 
							echo "<select required name=language>";
							while($row = $resultLangList->fetch_assoc()){
								$selected = $selectedLang == $row['language'] ? 'selected' : '';
								echo "<option id='language' " . $selected . " value='" . $row['language'] ."'>" . $row['language'] ."</option>";
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
								if($resultProgrammerFetch !== NULL){
									echo "Select a programmer for the lesson in the language:<br/>$bookLang<br/>";
									echo "<select name=programmer>";
									while($row = $resultProgrammerFetch->fetch_assoc())
									{
										echo "<option id='programmer' value='" . $row['name'] ."'>" . $row['name'] ."</option>";
									}
									echo "</select>";	
								}else{
									echo "<h4>No programmer available</h4>";
								}
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
					<input type="email" name="userEmail" id="userEmail" tabindex="2"  />
				</td>	
			</tr>
			<tr>
				<td>	
					<b><label for="date">Enter date of lesson:</b></label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" tabindex="4" />
				</td>	
			</tr>
			<tr>
				<td>	
					<b><label for="time">Enter time of lesson:</b><i>HH:MM</i></label> 
				</td>
			</tr>
			<tr>
				<td>
					<input type="time" name="time" id="time" min="09:00" max="18:00" value="09:00" step="3600" tabindex="5" />
				</td>	
			</tr>
			<tr>
				<td>
					<br/>
					<input type ="reset" id ="reset" tabindex ="6" />
					<input type ="submit" name="bookLesson" colspan ="2" id ="bookLesson" tabindex ="7"/> 
				</td>
			</tr>
		</table>
	</form>
	<?php	
		}
	?>
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
		
			<a href = "contact.php">| Contact Us |</a>
		</div>

			
		</body>	
	</div>
</html>
