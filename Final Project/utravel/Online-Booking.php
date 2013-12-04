<?php
include_once 'php_func.php';
session_start();

connect();
$guest_timeout = time() - 2 * 60;
$member_timeout = time() -5 * 60;
$guest_ip = $_SERVER['REMOTE_ADDR'];
$time = time();

if(isset($_SESSION['user'])){
    //if user is logged in
    $sql = mysql_query("DELETE FROM active_guests WHERE guest_ip ='" .$guest_ip. "'");
    $sql2 = mysql_query("REPLACE INTO active_members (username, time_visited) VALUES ('".$_SESSION['user']."','".$time."')");
}else{
    //Not logged in, guest
    $sql3 = mysql_query("REPLACE INTO active_guests(guest_ip, time_visited) VALUES ('".$guest_ip."','".$time."')");
}

$sql4 = mysql_query("DELETE FROM active_quests WHERE time_visited < ".$guest_timeout);
$sql5 = mysql_query("DELETE FROM active_members Where time_visited < ".$member_timeout);
$sql6 = mysql_query("SELECT guest_ip FROM active_guests");
$online_guests = mysql_num_rows($sql6);
$sql7 = mysql_query("SELECT username FROM active_members");
$online_members = mysql_num_rows($sql7);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>United Travel - Online Booking</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">
</head>

<body class="myBackground" style="height:1500px;">
        <div class="navbar navbar-static-top navbar-inverse" role="navigation">

            <div class="container">
                <!-- static navbar -->

                <div class="navbar-header">

                    <img class="myImg img-responsive" src="assets/newLogo.jpg">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav ">
                        <li>
                            <a href="home.html">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Hawaii Tours</a>
                                </li>
                                <li>
                                    <a href="#">Golf Packages</a>
                                </li>
                                <li>
                                    <a href="#">Wedding</a>
                                </li>
                                <li>
                                    <a href="#">Hotel Reservation</a>
                                </li>
                                <li>
                                    <a href="#">Conference</a>
                                </li>
                                <li>
                                    <a href="#">Other Services</a>
                                </li>
                                <li>
                                    <a href="#">Transfer</a>
                                </li>
                                <li>
                                    <a href="#">Special Rates</a>
                                </li>

                            </ul>
                        </li>


                        <li class="active">
                            <a href="#">On-line Booking</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Agents
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Tour Package Request Form</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">Contact</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">News
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Hawaii Culture</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Chinese</a>
                        </li>
                    </ul>
                </div>
                <!-- navbar collapse -->
            </div>
            <!-- container-->
        </div>

        <!-- navbar top fixed -->
        <div class=" container container-justified" style="background-color:white">
            与君同行，周游天下. Let's travel to  Hawaii and  the whole world  together...
        </div>
        <!--Line word -->
        <div width="100%"class="container col-lg-12 myBG">
            <?php
                if(isset($_SESSION['user'])){
                    echo '<h1> Welcome ' . $_SESSION['user'] . ' ';
                    echo '</h1>';
                }else{
                    echo  '<h1>Log In</h1><br>';
  
                }
?>
            <p><h3>Online Guests: <?php echo $online_guests; ?></h3></p>
            <p><h3>Online Members: <?php echo $online_members; ?></h3></p>
            
            <!-- LOG IN -->
            
            <?php
                if(!isset($_SESSION['user'])){
                    echo "<a href='login.php' type='button'class='btn btn-primary'>Log In</a>";
                    echo " ";
                    echo "<a href='sign-up.php' type='button' class='btn btn-default'>Sign Up</a>";
                }else{
                    echo '<a href="logout.php" type="button" class="btn btn-info">Log Out</a>';
                    addTravel();
                    displayLocations();
                }

              
            ?>   
            
            
            
            <!-- LOG IN END-->
            
            
            
        </div>
    <div class="navbar navbar-primary navbar-static-bottom">
    
        <p class = "navbar-text pull-right">Site made by Victor</p>
    </div>
        <!--<script src="../js/bootstrap.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>

</html>