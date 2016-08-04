<html>
	<body>
		<h1>Welcome <?php
$username=$_POST['user'];
echo "$username";
?>!</h1>





		<form action="shut.php" method="POST">
	<?php
$username=$_POST['user'];
echo "$username";
?><input type="text" name="ab" value="<?php
$username=$_POST['user'];
echo "$username";
?>">
<?php
$pa=$_POST['password'];
echo "$pa";
?><input type="text" name="pp" value="<?php
$pa=$_POST['password'];
echo "$pa";
?>">


</br></br>


<link rel="stylesheet" href="regg.css">



  <input class='animated' type='submit' name="hi" value='Shutdown'>
  <input class='animated' type='submit' value='get Location'>
</form>
	</body>
</html>





 