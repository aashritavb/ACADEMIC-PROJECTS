<html>

<body>

Command is <?php echo $_POST["name"]; ?><br>

<?php

$command=$_POST["name"];

$a = "python /home/sid/client.py ";

$b= $a.$command;

$last_line = system($b, $retval);

echo '

</pre>

<hr />Last line of the output: ' . $last_line;// . '

//<hr />Return value: ' . $retval;

?>

</body>

</html>
