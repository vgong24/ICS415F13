
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
        <title>SignUp</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/myStyle.css" rel="stylesheet">
            <form class="form-horizontal" method="post" action="sign-up.php">
                <div class="control-group">
                    <label class="control-label" for="Username">Username</label>
                        <input type="text" name="username" placeholder="Username"/><br>
                </div>
                <div class="control-group">
                    <label class="control-label" for="Password">Password</label>
                    <input type="password" name="password" placeholder="Password"/><br>
                    <input type="submit" class="btn btn-default" name="Sign Up" value="Sign Up" />
                </div>
            </form>
