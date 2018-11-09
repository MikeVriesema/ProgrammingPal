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
			<a href = "form.php">Register</a>
			<a href = "#">Lessons</a>
			<a href = "#">Testimonials</a>
			<a href = "#">Contact Us</a>
		</nav>	
	
		<div id = "content">
		
		<h2>Register Today!</h2>
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
					<b><label for="year">Year:</label></b>
				</td>	
				
				<td>
					
					<!-- CODE I FOUND THAT MIGHT BE USEFUL 
					<select name="years">

					<?php 

					for($i=1; $i<=4; $i++)
					{

						echo "<option value=".$i.">".$i."</option>";
					}
					?> 
						 <option name="years"> </option>   
					</select> 
					
					
					<input type="submit" name="submitYears" value="Year" />
					-->
					
					<select name="language" id="language" tabindex="3" multiple="multiple">
							<option value="java">Java</option>
							<option value="c">C</option>
							<option value="bash">Bash</option>
							<option value="php">Php</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>
					<b><label for="userType">UserType:</label></b>

				</td>
				
				<td>
					Student<input type ="radio" name ="userType" id = "userType" tabindex = "4" value = "0"/>
					<br/>
					Programmer<input type ="radio" name ="userType" id = "userType" tabindex = "5" value = "1"/>
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
			
	/**
	DROP DOWN FROM DB IN PHP,NEEDS WORK
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
	$conn->close();
	?>
	<?php
	?>
	
	**/
		
		
		<div class = "clear"></div>
		<div id = "footer">
			<p>Programming Pal,</p>
			<p>123 UL Street,</p>
			<p>Co. Limerick</p>
			<a href="mailto:programming4life@programmingpal.com" target="_top">Send us an email!</a>
		</div>

			
		</body>	
	</div>
</html>

