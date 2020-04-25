<?php
include("config.php");

session_start();
$_SESSION['loginerrorFlag'] = FALSE;
$_SESSION['registererrorFlag'] = FALSE;
if (!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] === FALSE) {
    header("location: Inicio.php#");
    exit;
}
$id = '';
$sql = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../CSS/ibras.css"> -->
</head>

<body>
    <aside class="asidediv">
        <?php include('customersidenavbar.php'); ?>

    </aside>
    <header>
        <div class="topnav" id="myTopnav">
            <div class="dropdown">
                <button class="dropbtn" onclick="dropdownvisible()"> <i class="fas fa-user"></i> Welcome <?php echo $_SESSION['username'];  ?>
                </button>
                <div class="dropdown-content">
                    <a href="../HTML/CustomerMyProfile.php">My Profile</a>
                    <p><a href="../HTML/CustomerMenuPage.php" class="navbarhiddenfields">Menu</a></p>
                    <p><a href="../HTML/CustomerCartPage.php" class="navbarhiddenfields">Cart</a></p>
                    <p><a href="../HTML/CustomerOrdersPage.php" class="navbarhiddenfields">Orders</a></p>
                    <!-- <a href="../HTML/CustomerOrdersPage.php" class="navbarhiddenfields">Enquiries</a> -->
                    <a href="../HTML/logout.php">Logout</a>
                </div>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </header>
    <section></section>
    <section></section>
    <section></section>
    <main><br>
        <div class="row" style="text-align:center">
            <h2>Order History</h2>
        </div>

        <br>
        <div class="tableoverflowdiv">
            <table id="review">
                <tr>
                    <th>Order Number</th>
                    <!-- <th>Item Name</th>
                    <th>Quantity</th> -->
                    <th>Order Price</th>
                </tr>
                <?php

                $sql = "select orders.OrderID,orders.OrderPrice  from orders, users where orders.UserID = users.UserID and users.Username ='" . $_SESSION['username'] . "'";
                $result = mysqli_query($db, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['OrderID'] ?></td>
                        <td><?php echo $row['OrderPrice'] ?></td>
                        <?php $count = $count + 1; ?>
                    </tr>
                <?php }
                if ($count == 0) {
                    echo "<tr><td colspan='2'>No Rows to Display</td></tr>";
                }
                ?>
        </div>
    </main>
    <footer></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>