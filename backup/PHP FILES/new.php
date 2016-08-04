<html>
<br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</html>
<?php
	$username = "root";
	$password = "test123";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	
	$selected = mysql_select_db("vehicle", $dbhandle);

		if(isset($_POST['username']) && isset($_POST['UPassword'])){
			$user = $_POST['username'];
			$pid = $_POST['UPassword'];
			

			$query = mysql_query("SELECT * FROM login WHERE name='$user' AND password='$pw'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				
				echo("User has already Registered");
				
			}else{
				mysql_query("INSERT INTO login (name,password) VALUES ('$user','$pid')");
				echo("User Registered Successfully");
			}
	}
	mysql_close();
?>


<link rel="stylesheet" href="regg.css">