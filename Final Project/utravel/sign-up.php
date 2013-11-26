
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
    $sql = "SELECT * FROM users WHERE username='" . $username . "'";
    $res = mysql_query($sql);
    if(mysql_num_rows($res) >=1){

        echo "Username already exists. Return to previous page";
        exit();
    } else{
        $sql2 = "INSERT INTO users (username, password) VALUES ('".$username."','".$password."')";
        mysql_query($sql2);
        echo "You have successfully signed up.";
        header("Location: Online-Booking.php");
        exit();
    }
}

?>

            <form method="post" action="sign-up.php">
            Username: <input type="text" name="username" /><br>
            Password: <input type="password" name="password" /><br>
            <input type="submit" name="submit" value="Sign up" />
            </form>
