<?php
    include_once 'Online-Booking.php';

function check(){
        @session_start();
        connect();
    if(isset($_POST['dropdown']) && isset($_SESSION['user'])){
        $username = $_SESSION['user'];
        $location = $_POST['dropdown'];
        $addsql = mysql_query("REPLACE INTO travels (username, country) VALUES ('". $username ."', '". $location ."')");
    }
    }

    function connect(){
        $host = "localhost";
        $user = "user";
        $pass = "password";
        $db = "test";

        mysql_connect($host, $user, $pass);
        mysql_select_db($db);   
    }

    function query(){
    $myData = mysql_query("SELECT * FROM locations");
    while($record = mysql_fetch_array($myData)){
        echo '<option value="' . $record['country'] . '">' . $record['country'] . '</option>'; 
    }
    }

    function addTravel(){
        if(isset($_SESSION['user'])){
                echo '<form name="add" method="post" action="'. check() . '">';
                echo '<br><p>Where would you like to go? <select name="dropdown">';
                query();
                echo '</select></p>';
                echo '<input type="submit" class="btn btn-primary" name="submit" value="submit" />';
                echo '</form>';
            }
            
    }

    function displayLocations(){
        $dquery = mysql_query("SELECT * FROM travels WHERE username='". $_SESSION['user'] ."'");
        echo "<h4>Places you would like to visit:</h4>";
        while($results = mysql_fetch_array($dquery)){
            echo $results['country'];
            echo '<br>';
        }
    }

        
?>