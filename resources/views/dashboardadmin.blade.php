<?php
include("config.php");

session_start();
$_SESSION['loginerrorFlag'] = FALSE;
$_SESSION['registererrorFlag'] = FALSE;
if (!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] === FALSE) {
    header("location: Inicio.php#");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/ibras.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>
    <link href="https://db.onlinewebfonts.com/c/41f5e8ff1d98d490a19c6d48ea7b74b1?family=Beyond+The+Mountains" rel="stylesheet" type="text/css" />
    <title>Menu</title>
</head>

<body>
    <!-- <div id="dashboardadminmainpage"> -->
        <div id="dashbardadminnavleft">
            <div id="dashbardadminnavleftinnerdiv">
                <div><img src="..\Images\5.png" alt="logo" /></div>
                <p><a href="">Overview</a></p>
                <p><a href="../HTML/Dashboard_Admin Menu.html">Menu</a></p>
                <p><a href="../HTML/Dashboard Admin My Profile.html">My Profile</a></p>
                <p><a href="">Reviews</a></p>
                <p><a href="../HTML/Dashboard_Admin Users.html">Users</a></p>
            </div>
        </div>

        <div id="dashboardadminrightdiv">
            <div id="dashboardadmintopnav">
                <div id="dashboardadmintopnavuser">


                    <img src="../Images/client2.jpg" alt="">
                    <p id="dashboardadminusername"><?php echo $_SESSION['username'];  ?></p>
                    <button onclick="location.href = 'logout.php'" type="button">Logout</button>
                </div>
            </div>
            <div id="dashboardadminright">
                <div id="usercards">
                    <h3>My Dashboard</h3>
                    <h4>Monthly</h4>
                    <div class="userscard">
                        <h4>Net Earnings</h4>
                        <p class="userstitle"><span class="earningsvalue">

                                <?php

                                $sql = "SELECT SUM(`Item_Price`) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo "$".$count;
                                $netearningsmonthly = $count;
                                ?>
                            </span></p>
                    </div>

                    <div class="userscard">
                        <h4>Orders Received</h4>
                        <p class="userstitle"><span class="earningsvalue">
                                <?php

                                $sql = "SELECT COUNT(Distinct(`OrderID`)) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo $count;
                                ?>


                            </span></p>
                    </div>

                    <div class="userscard">
                        <h4>Monthly Users</h4>
                        <p class="userstitle"><span class="earningsvalue">
                                <?php

                                $sql = "SELECT COUNT(Distinct(`USERID`)) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo $count;
                                ?>

                            </span></p>
                    </div>
                    <div class="userscard">
                        <h4>Monthly Profit</h4>
                        <p class="userstitle"><span class="earningsvalue">
                        <?php echo "$".$netearningsmonthly*0.15; ?>
                        </span></p>
                    </div>
                    <br>
                    <br>
                    <h4>Daily</h4>
                    <div class="userscard">
                        <h4>Net Earnings</h4>
                        <p class="userstitle"><span class="earningsvalue">
                                <?php

                                $sql = "SELECT SUM(`Item_Price`) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW()) and Day(Order_Time)=Day(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo "$".$count;
                                $netearningsdaily = $count;
                                ?>
                            </span></p>
                    </div>

                    <div class="userscard">
                        <h4>Orders Received</h4>
                        <p class="userstitle"><span class="earningsvalue">

                                <?php

                                $sql = "SELECT COUNT(Distinct(`OrderID`)) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW()) and Day(Order_Time)=Day(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo $count;
                                ?>
                            </span></p>
                    </div>

                    <div class="userscard">
                        <h4>Today's Users</h4>
                        <p class="userstitle"><span class="earningsvalue">
                                <?php

                                $sql = "SELECT COUNT(Distinct(`USERID`)) as 'Total' FROM orders WHERE YEAR(Order_Time)=Year(NOW()) and Month(Order_Time) = Month(NOW()) and Day(Order_Time)=Day(NOW())";

                                $result = mysqli_query($db, $sql);
                                $res  = mysqli_fetch_object($result);
                                $count = $res->Total;
                                echo $count;
                                ?>

                            </span></p>
                    </div>
                    <div class="userscard">
                        <h4>Today's Profit</h4>
                        <p class="userstitle"><span class="earningsvalue">
                                <?php echo "$".$netearningsdaily * 0.15; ?>


                            </span></p>
                    </div>
                    <!-- <div class="userscard">
                        <h4>New Reviews</h4>
                        <p class="userstitle">3000</p>
                    </div> -->
                </div>
                <div id="usercards" class="trendingorders">
                    <br><br><br>
                    <h3>Trending Orders</h3>
                    <div class="userscard">
                        <div>
                            <img src="..\Images\burguer1.png" alt="">
                            <p class="menulatestburgerdivpdashboard">Mixta</p>
                            <p class="menulatestburgerdivp2dashboard">$11.90</p>
                            <h5>Orders Per Day: 300</h5>
                        </div>
                    </div>

                    <div class="userscard">
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="menulatestburgerdivpdashboard">Pollo</p>
                            <p class="menulatestburgerdivp2dashboard">$11.90</p>
                            <h5>Orders Per Day: 300</h5>
                        </div>
                    </div>

                    <div class="userscard">
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="menulatestburgerdivpdashboard">Pollo</p>
                            <p class="menulatestburgerdivp2dashboard">$11.90</p>
                            <h5>Orders Per Day: 300</h5>
                        </div>
                    </div>
                    <div class="userscard">
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="menulatestburgerdivpdashboard">Pollo</p>
                            <p class="menulatestburgerdivp2dashboard">$11.90</p>
                            <h5>Orders Per Day: 300</h5>
                        </div>
                    </div>
<br><br><br>

                </div>
            </div>
        <!-- </div> -->
</body>

</html>