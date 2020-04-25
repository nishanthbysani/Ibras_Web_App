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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>
    <script type="text/Javascript" src="../JS/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <!-- <link rel="stylesheet" href="../CSS/ibras.css"> -->

</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
    
    <aside class="asidediv">
        <?php include('sidenavbar.php'); ?>

    </aside>
    <header>
        <div class="topnav" id="myTopnav">
            <div class="dropdown">
                <button class="dropbtn" onclick="dropdownvisible()"> <i class="fas fa-user"></i> Welcome <?php echo $_SESSION['username'];  ?>
                </button>
                <div class="dropdown-content">
                    <a href="../HTML/AdminMyProfile.php">My Profile</a>
                    <a href="../HTML/Dashboard.php" class="navbarhiddenfields">Home</a>
                    <a href="../HTML/AdminMenuPage.php" class="navbarhiddenfields">Menu</a>
                    <a href="../HTML/AdminReviewPage.php" class="navbarhiddenfields">Reviews</a>
                    <a href="" class="navbarhiddenfields">Users</a>
                    <a href="../HTML/AdminEnquiryPage.php" class="navbarhiddenfields">Enquiries</a>
                    <a href="../HTML/AdminStaffTimeSheet.php" class="navbarhiddenfields">Timesheet</a>
                    <a href="../HTML/AdminInventory.php" class="navbarhiddenfields">Inventory</a>
                    <a href="../HTML/logout.php">Logout</a>
                </div>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </header>
    <section>
    </section>
    <section></section>
    <section></section>
    <main>
        <div id="usercards">
            <h1>My Dashboard</h1>
            <h2 class="dashboardheading">Monthly</h2>
            <div class="userscard">
                <h4>Net Earnings</h4>
                <p class="userstitle"><span class="earningsvalue">

                        <?php

                        $sql = "SELECT SUM(`OrderPrice`) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())";

                        $result = mysqli_query($db, $sql);
                        $res  = mysqli_fetch_object($result);
                        $count = $res->Total;
                        if (empty($count)) {
                            $count = 0;
                        }
                        echo "$" . $count;
                        $netearningsmonthly = $count;
                        ?>
                    </span></p>
            </div>

            <div class="userscard">
                <h4>Orders Received</h4>
                <p class="userstitle"><span class="earningsvalue">
                        <?php

                        $sql = "SELECT COUNT(Distinct(`OrderID`)) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())";

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

                        $sql = "SELECT COUNT(Distinct(`USERID`)) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())";

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
                        <?php echo "$" . $netearningsmonthly * 0.15; ?>
                    </span></p>
            </div>
            <br>
            <br>
            <h2 class="dashboardheading">Daily</h2>
            <div class="userscard">
                <h4>Net Earnings</h4>
                <p class="userstitle"><span class="earningsvalue">
                        <?php

                        $sql = "SELECT SUM(`OrderPrice`) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())";

                        $result = mysqli_query($db, $sql);
                        $res  = mysqli_fetch_object($result);
                        $count = $res->Total;
                        if (empty($count)) {
                            $count = 0;
                        }
                        echo "$" . $count;
                        $netearningsdaily = $count;
                        ?>
                    </span></p>
            </div>

            <div class="userscard">
                <h4>Orders Received</h4>
                <p class="userstitle"><span class="earningsvalue">

                        <?php

                        $sql = "SELECT COUNT(Distinct(`OrderID`)) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())";

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

                        $sql = "SELECT COUNT(Distinct(`USERID`)) as 'Total' FROM orders WHERE YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())";

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
                        <?php echo "$" . $netearningsdaily * 0.15; ?>


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
                    <!-- <h5>Orders Per Day: 300</h5> -->
                </div>
            </div>

            <div class="userscard">
                <div>
                    <img src="..\Images\burguer2.png" alt="">
                    <p class="menulatestburgerdivpdashboard">Pollo</p>
                    <p class="menulatestburgerdivp2dashboard">$11.90</p>
                    <!-- <h5>Orders Per Day: 300</h5> -->
                </div>
            </div>

            <div class="userscard">
                <div>
                    <img src="..\Images\burguer2.png" alt="">
                    <p class="menulatestburgerdivpdashboard">Pollo</p>
                    <p class="menulatestburgerdivp2dashboard">$11.90</p>
                    <!-- <h5>Orders Per Day: 300</h5> -->
                </div>
            </div>
            <div class="userscard">
                <div>
                    <img src="..\Images\burguer2.png" alt="">
                    <p class="menulatestburgerdivpdashboard">Pollo</p>
                    <p class="menulatestburgerdivp2dashboard">$11.90</p>
                    <!-- <h5>Orders Per Day: 300</h5> -->
                </div>
            </div>
            <br><br><br>

        </div>
    </main>
    <footer></footer>

</body>

</html>