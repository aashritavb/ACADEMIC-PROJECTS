
<html>
	<body>
		<h1><link rel="stylesheet" href="regg.css"><br><br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <?php
$u=$_POST['ab'];
?></h1>
		<?php
	$username="root";
	$password="test123";
	$hostname="localhost";
	
	$dbhandle=mysql_connect($hostname, $username, $password) or die("could not connect to database");
	$selected =mysql_select_db("vehicle",$dbhandle);
	$ua=$_POST['ab'];
	$pw=$_POST['pp'];
	if(isset($_POST['ab']) && isset($_POST['pp'])){
			$ua = $_POST['ab'];
			$pw = $_POST['pp'];
			

			$query = mysql_query("SELECT * FROM login WHERE name='$ua' AND password='$pw'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				
				
mysql_query("UPDATE shutdown SET flag='1' WHERE name='$ua'");
echo("SHUTDOWN Successfull");
				
			}else{
				
				echo("Authentication Failure");
			}
	}
	mysql_close();
?>

	</body>
</html>