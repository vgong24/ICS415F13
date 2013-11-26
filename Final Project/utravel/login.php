<?php
session_start();

$host = "localhost";
$user = "user";
$pass = "password";
$db = "test";

mysql_connect($host, $user, $pass);
mysql_select_db($db);

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password= '" . $password."' LIMIT 1";
    $res = mysql_query($sql);
    if(mysql_num_rows($res) ==1){
        echo "You have successfully logged in.";
        $_SESSION['user'] = $username;
        header("Location: Online-Booking.php");
        exit();
    } else{
        echo "Invalid login information. Please return to the previous page.";
        exit();
    }
}

?>

            <form method="post" action="login.php">
            Username: <input type="text" name="username" /><br>
            Password: <input type="password" name="password" /><br>
            <input type="submit" name="submit" value="Log In" />
            </form>