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
		
		<h2>Programmer Registration!</h2>
			<form method="POST" action ="form.php" id="mainForm">
			<table id ='formTable'>
				<tr>
					<td>	
							
						<b><label for="name">Name:</label></b>
					</td>
					<td>
						<input type="text" name="name" id="" tabindex="1" required/>
					</td>	
				</tr>

				<tr>
				<td>		
					<b><label for="email">Email:</label></b>
					</td>
					<td>
						<input type="text" name="email" id="" tabindex="2" required/>
					</td>
				</tr>
				<tr>
					<td>
						<b>Select a Language:</b>
						<br/>
							<?php
								//DO A NULL ENTRY CHECK ON ALL FORMS
								$conn = mysqli_connect("localhost", "root", "", "ProgrammingPal") or die("Unable to connect to DBMS."); 
								$sqlLangFetch = "SELECT * FROM languages"; 
									$resultLangList = $conn->query($sqlLangFetch); 
								$buttonCount = 1;
								if($resultLangList->num_rows > 0){
									while($row = $resultLangList->fetch_assoc()){
										echo "<input multiple type='checkbox' name='" . $row['languageID'] ."' value='" . $row['language'] ."'>" . $row['language'] ."<br>";
										$buttonCount++;
									}
								} else {
									echo "<h2>No results returned.</h2>";
								}
								if( isset( $_POST['submit'] ) ){
									$progName = $_POST['name'];
									$progEmail = $_POST['email'];
									$langs=array();
									$langID=array();
									$progData=array();
									$counter = 0 ;
									for($i = 1; $i < $buttonCount; $i++){
										if(!empty($_POST[$i])){
											$langs[$counter] = $_POST[$i];
											$langID[$counter] = $i;
											$counter++;
										}
									}
									$registerProg = "INSERT INTO programmers(name, email) VALUES('$progName', '$progEmail')";
									if ($conn->query($registerProg) === TRUE) {
										echo "<br/>Programmer Registered!<br/>";
										$sqlProgIDFetch = "SELECT programmerID FROM programmers WHERE email = '$progEmail'"; 
										$resultProgID = $conn->query($sqlProgIDFetch); 
										while($row = $resultProgID->fetch_assoc()){
											$progID = $row["programmerID"];
										}						
										for($i = 0;$i<sizeof($langs);$i++) {
											$progData[] = '("'.$progID.'", "'.$langID[$i].'")';
										}
										$registerSkill = 'INSERT INTO skills(programmerID, languageID)  VALUES'.implode(',',$progData);
										if ($conn->query($registerSkill) === TRUE) {
											echo "Language set entered.";
										} else {
											echo "Error: " . $registerSkill . "<br>" . $conn->error;
										}
									} else {
										echo "Error: " . $registerProg . "<br>" . $conn->error;
									}
								}
								$conn->close();
							?>
					</td>
				</tr>
				<td>
				<br/>
					<input type ="reset" id ="reset" tabindex ="3" />
					<input type ="submit" name = "submit" colspan ="2" id ="submit" tabindex ="4"/>
				</td>
			</table>
		</form>				
	</div>	
			
	
	
	<div id = "content2">
		
		<h2>Testimonial</h2>
	
		
		<img src="images/james.jpg" title="James"  alt="James"></img>

		<p>"I love working for Programming Pal. I get to help people while also expanding my own knowledge on the topics I teach."</p>

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

