<?php 

$mysqli1 = connect();
$myCount = 0;
echo "
<html>
<title>HTML with PHP</title>

<body>
Display Content:<br>
<p id='content' style='border:1px solid'>
";
	echo createTable($mysqli1);
	if(isset($_COOKIE['user'])){
		$userCookie = $_COOKIE['user'];
		echo "Cookie of username is " . $userCookie . "<br>";
		echo displayComments($mysqli1, $userCookie);
		$myCount = totalComments($mysqli1, $userCookie);

		
	}else if(isset($_POST['user'])){
		$userName = $_POST['user'];
		setcookie('user', $userName, time()+60);
		echo displayComments($mysqli1, $userName) . "<br>";
		$myCount = totalComments($mysqli1, $userName);
	}else{
		echo "did not submit form yet <br>";
	}
	
	//insert comment time
	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$comment = $_POST['txt'];
		echo insertComments($mysqli1, $user, $comment);
	}
	
	
	
echo "
</p>

<form name='form' action='' method='post'>

<p>
Enter UserName:<input type='text' name='user'><br>
Add Comment:<input type='text' name='txt'>
<button type='submit' value='Submit'>Submit</button>
</p>

</form>

";
echo $myCount;

"
</body>
</html>



";	
$mysqli1->close();
?>
<?php
function connect(){
	$mysqli = new mysqli("localhost", "user", "password");
	$selected = "CREATE DATABASE test";
	echo "Connecting to database... <br>";
	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL:(" . $mysqli->connect_errno . ")" . $mysqli->connect_error ;
	}else{
		echo "connected<br>";
	}
	if($mysqli->query($selected)){
		echo "database test created <br>" ;
	}else{
		echo $mysqli->error . "<br>";
	}
	if($mysqli->select_db("test")){
		echo "selected database test<br>";
	}else{
		echo "unable to select db " . $mysqli->error . "<br>";
	}
	
	return $mysqli;
}

function createTable($mysqli){
$sql = "CREATE TABLE Comments(user CHAR(30), comment CHAR(30))";
	if(!$mysqli->query($sql)){
			//echo "failed to create table<br>" . $mysqli->error . "<br>";
	}else{
		echo "created table<br>";
	}
}
function insertComments($mysqli, $user, $comment){
	$mysqli->query("INSERT INTO Comments VALUES('" . $user . "','" . $comment . "')");

}

function displayComments($mysqli, $user){
	$result = $mysqli->query("SELECT * FROM Comments WHERE Comments.user = '" . $user . "'");
	if($result){
	while($row = $result->fetch_assoc()){
		echo $row['user'];
		echo ", ";
		echo $row['comment'];
		echo "<br>";
	}
	$result->free();
	}
	else{
		echo "no result <br>";
	}
	
	}
	
	function totalComments($mysqli, $user){
	$count = 0;
	$result = $mysqli->query("SELECT * FROM Comments WHERE Comments.user = '" . $user . "'");
	if($result){
	while($row = $result->fetch_assoc()){
		$count++;
	}
	$result->free();
	}
	
	return $count;
	}
?>