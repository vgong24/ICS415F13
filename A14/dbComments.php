<?php 
echo "
<html>
<title>HTML with PHP</title>

<body>
<p id='content'>Display Content:<br>
";
	if(isset($_POST['txt'])){
		echo connect();
	}
	
echo "
</p>

<form name='form' action='' method='post'>
<p>Add Comment:<input type='text' name='txt'>
<button type='submit' value='Submit'>Submit</button>
</p>

</form>

</body>
</html>



";	
?>
<?php
function connect(){
	$mysqli = new mysqli("localhost", "user", "password");
	$selected = "CREATE DATABASE test";
	$cname = $_POST['txt'];
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL:(" . $mysqli->connect_errno . ")" . $mysqli->connect_error ;
	}else{
		echo "connected<br>";
	}
	if($mysqli->query($selected)){
		echo "database test created <br>" ;
	}else{
		echo "database not created <br>" . $mysqli->error . "<br>";
	}
	if($mysqli->select_db("test")){
		echo "selected database test<br>";
	}else{
		echo "unable to select db " . $mysqli->error . "<br>";
	}
	
	$sql = "CREATE TABLE Comments(Comment CHAR(30))";
	if(!$mysqli->query($sql)){
			echo "failed to create table<br>" . $mysqli->error . "<br>";
	}else{
		echo "created table<br>";
	}
	
	echo insertComments($mysqli, $cname);
	echo displayComments($mysqli);
	$mysqli->close();
}
function insertComments($mysqli, $cname){
echo $mysqli->query("INSERT INTO Comments VALUES('" . $cname . "')");
}

function displayComments($mysqli){
	$result = $mysqli->query("SELECT * FROM Comments");
	while($row = $result->fetch_assoc()){
		echo $row['Comment'];
		echo "<br>";
	}
	$result->free();
	}
?>