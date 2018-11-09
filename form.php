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
			<a href = "#">Example 3</a>
			<a href = "#">Example 4</a>
			<a href = "#">Example 5</a>
		</nav>	
	
		<div id = "content">
		
		<h1>Some Stuff</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a pulvinar lectus. Vestibulum pellentesque, ligula in laoreet iaculis, purus nibh laoreet enim, in tempor felis risus ut ex. Vestibulum id venenatis ligula. Integer pellentesque mauris sit amet neque imperdiet tempor. Vivamus interdum semper sapien, et vestibulum sem finibus nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sapien nibh, laoreet mollis augue vitae, tempus sagittis risus. Etiam in nisi rhoncus, dapibus dolor sed, accumsan elit. Nam tortor nibh, tincidunt a aliquam non, vestibulum eu arcu. Phasellus orci turpis, vestibulum consectetur vestibulum eget, elementum maximus justo. Phasellus tempus ligula nec lorem laoreet, eget sollicitudin orci interdum. Fusce nec viverra dui. Sed congue nunc a consectetur auctor. Donec tempus rhoncus eros. Duis eu rutrum dui. Suspendisse justo dolor, suscipit eu vulputate ac, elementum ac massa.</p>

		<ul>
			<li>Java</li>
			<li>C</li>
			<li>Php</li>
			<li>HTML</li>
		</ul>

		<p>Nunc ipsum arcu, mollis sit amet nulla in, interdum fringilla lectus. Curabitur laoreet, dui sed dapibus egestas, mauris urna suscipit sem, quis ullamcorper nisi lorem in nisi. Mauris vel lorem luctus, tempus massa eu, vestibulum ipsum. Sed auctor tincidunt libero a consequat. Quisque elementum nec nunc vel malesuada. Nullam tellus lacus, tincidunt sed pulvinar at, pellentesque et sapien. Duis quis urna eget sem congue sodales. Ut suscipit ante vel nulla efficitur, ut viverra erat aliquam. Sed sagittis ultricies dictum. Aliquam nec pretium est, vel interdum libero. Mauris luctus enim et condimentum scelerisque. Nulla fringilla arcu sit amet sem vulputate aliquam.</p>
		
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

