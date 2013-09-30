<html>
<title>HTML with PHP</title>

<body>
<p>Adding Comments to File "comments.txt"</p>

<p id="content">Display Content:<br>
<?php
	$filename = "comments.txt";
	$file = fopen($filename,"a+");
	if(filesize($filename) > 0){
	$comments = fread($file,filesize($filename));
	echo $comments;
	//echo "success";
	}
	fclose($file);
?>
</p>

<form name="form" action="commentInput.php" method="post">
<p>Add Comment:<input type="text" name="txt">
<button type="submit" value="Submit">Submit</button>
</p>

</form>
<?php
	$filename = "comments.txt";
	$file = fopen($filename,"a+");
	fclose($file);
?>

</body>
</html>


<?php
	$filename = "comments.txt";
	$file = fopen($filename,"a+");
	
foreach($_POST as $a=>$b){
	echo "Inserting \"".$b. "\" to ". $filename . "<br>";
	fwrite($file, $b . "</br>");
	
}
	fclose($file);
?>

