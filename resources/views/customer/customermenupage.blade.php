<?php
include("config.php");

session_start();
$_SESSION['loginerrorFlag'] = FALSE;
$_SESSION['registererrorFlag'] = FALSE;
if (!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] === FALSE) {
    header("location: Inicio.php#");
    exit;
}
$itemaddedflag = false;
?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // echo $_POST['menuitemquantity'];
    if (isset($_POST["addtocart"])) {
        $itemquantity = $_POST['menuitemquantity'];
        // echo $itemquantity;
        $customeruserid = '';
        $sql = "select UserID from users where Username ='" . $_SESSION['username'] . "'";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $customeruserid = $row['UserID'];
            // echo $customeruserid;
            break;
        }
        $sql = "select count(CartID) as count,a.UserID from cart a, users b where a.MenuID= '" . $_POST['hiddenitemid'] . "' and a.UserID=b.UserID and b.Username ='" . $_SESSION['username'] . "' ";
        // echo "-----";
        // echo $sql;
        // echo "-----";
        $result = mysqli_query($db, $sql);
        $countrows = mysqli_num_rows($result);
        // echo $countrows;
        if ($countrows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                // echo "count=".$row['count']; 
                if ($row['count'] > 0) {
                    $sql = "update cart inner join users on cart.UserID = users.UserID set cart.quantity='" . $_POST['menuitemquantity'] . "' where cart.MenuID ='" . $_POST['hiddenitemid'] . "'";
                    $result = mysqli_query($db, $sql);
                    // $countrows = mysqli_num_rows($result);
                    if ($result > 0) {
                        $itemaddedflag = true;
                        echo "<script>alertpop();</script>";
                    }
                    break;
                } else {
                    $sql = "insert into cart(`MenuID`,`itemname`,`Quantity`,`itemprice`,`UserID`)values('" . $_POST['hiddenitemid'] . "','" . $_POST['hiddenitemname'] . "','" . $itemquantity . "','" . $_POST['hiddenitemprice'] . "',   '" . $customeruserid . "')";
                    // echo $sql;
                    $result = mysqli_query($db, $sql);
                    if ($result > 0) {
                        $itemaddedflag = true;
                        echo "<script>alertpop();</script>";
                        break;
                    }
                }
            }
        } else {
            $sql = "insert into cart(`MenuID`,`itemname`,`Quantity`,`itemprice`,`UserID`)values('" . $_POST['hiddenitemid'] . "','" . $_POST['hiddenitemname'] . "','" . $itemquantity . "','" . $_POST['hiddenitemprice'] . "',   '" . $customeruserid . "')";
            // echo $sql;
            $result = mysqli_query($db, $sql);
            if ($result > 0) {
                $itemaddedflag = true;
                echo "<script>alertpop();</script>";
            }
        }
    }
} ?>
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
    <main>
        <!-- Menu add to cart -->
        <div class="alert success" id="alertpopup">
            <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
            <strong>Success!</strong> Your Item has been added to cart.
        </div>
        <div id="usercards">
            <h3>Menu</h3>

            <?php
            $sql = "select * from `menu`";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="userscard">
                    <form method="POST">
                        <div>
                            <img src="..\Images\burguer1.png" alt="">
                            <p class="menulatestburgerdivpdashboard"><?php $menuitemname = $row['itemname'];
                                                                        echo $menuitemname; ?></p>
                            <p class="menulatestburgerdivp2dashboard">$<?php $menuitemprice = $row['price'];
                                                                        echo $menuitemprice; ?></p>
                            <p class="menulatestburgerdivp2dashboard"><?php $menuitemdescription = $row['description'];
                                                                        echo $menuitemdescription; ?></p>
                            <p class="menulatestburgerdivp2dashboard"><?php $menuitemnutrientfacts =  $row['nutrientfacts'];
                                                                        echo $menuitemnutrientfacts; ?></p>
                            <input type="hidden" name="hiddenitemname" value="<?php echo $row['itemname']; ?>">
                            <input type="hidden" name="hiddenitemprice" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="hiddenitemid" value="<?php echo $row['MenuID']; ?>">
                            <input type="number" name="menuitemquantity" class="menuquantity" value="1" min="1" required>
                        </div>
                        <p id="userbuttoneffect">
                            <button id="menuitemedit" name="addtocart" type="submit"> Add to Cart
                            </button>
                            <!-- </a> -->
                        </p>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>

    </main>
    <footer>   <?php include('dashboardfooter.php');?></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>
<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<script>document.getElementById('alertpopup')style.display = 'none';</script>";
}
if ($itemaddedflag == true) {
    echo "<script>alertpop();</script>";
    $itemaddedflag = false;
}
?>


</html>