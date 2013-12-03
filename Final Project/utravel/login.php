
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
<html>


    <head>
        <title>Login Page</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/myStyle.css" rel="stylesheet">
    </head>
    <body>

            <form class="form-horizontal" method="post" action="login.php">
                <div class="control-group">
                    <label class="control-label" for="Username">Username</label>
                        <input type="text" name="username" placeholder="Username"/><br>
                </div>
                <div class="control-group">
                    <label class="control-label" for="Password">Password</label>
                    <input type="password" name="password" placeholder="Password"/><br>
                    <input type="submit" class="btn btn-default" name="submit" value="Log In" />
                </div>
            </form>
        </body>
</html>
