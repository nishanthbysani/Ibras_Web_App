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
$orderedflag = false;

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // echo "value" . $_POST['cartmenuid'];
    if (isset($_POST["removefromcart"])) {
        $sql = "delete cart from cart inner join users on cart.UserID = users.UserID where  cart.MenuID='" . $_POST['cartmenuid'] . "' and users.Username='" . $_SESSION['username'] . "' ";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        // echo $result;
        if ($result > 0) {
            $itemaddedflag = true;
            echo "<script>alertpop();</script>";
        }
    } else if (isset($_POST["ordernow"])) {
        $result = mysqli_query($db, "SELECT count(*) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_assoc($result);
        $total = $data['total'];
        // echo $total;
        $result = mysqli_query($db, "SELECT UserID from users where Username='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_assoc($result);
        $cartuserid = $data['UserID'];
        // echo $cartuserid;
        if ($total > 0) {
            $sql = "SELECT SUM(cart.itemprice * cart.quantity) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $_SESSION['username'] . "'";
            $result = mysqli_query($db, $sql);
            $data = mysqli_fetch_assoc($result);
            $carttotal = $data['total'];
            $sql = "insert into orders(`OrderPrice`,`UserID`)values('" . $carttotal . "','" . $cartuserid . "')";
            $result = mysqli_query($db, $sql);
            if ($result > 0) {
                $sql = "SELECT MAX(OrderID) as NewOrderID from orders where UserID='" . $cartuserid . "'";
                $result = mysqli_query($db, $sql);
                $data = mysqli_fetch_assoc($result);
                $neworderid = $data['NewOrderID'];
                $sql = "SELECT * from cart where UserID= '" . $cartuserid . "'";
                // echo $sql;
                $cartresult = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($cartresult)) {
                    $sql = "insert into orderitems(`orderID`,`menuID`,`quantity`) values('" . $neworderid . "','" . $row['MenuID'] . "','" . $row['Quantity'] . "')";
                    $result = mysqli_query($db, $sql);
                
                }
                $sql = "insert into feedback (`OrderID`,`UserID`)values('".$neworderid."','".$cartuserid."')";
                $result = mysqli_query($db, $sql);
                $sql = "truncate cart";
                $result = mysqli_query($db, $sql);
                



                $orderedflag = true;

                // $itemaddedflag = true;
                echo "<script>alertpoporder();</script>";
            }
        }
    }
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
    <section>
        <div class="userscard">
            <div>
                <h2>Cart Total</h2>
                <?php

                $sql = "SELECT SUM(cart.itemprice * cart.quantity) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $_SESSION['username'] . "'";
                $result = mysqli_query($db, $sql);
                $data = mysqli_fetch_assoc($result);
                $carttotal = $data['total'];

                ?>
                <h4>$<?php echo $carttotal ?></h4>
            </div>
        </div>
    </section>
    <section>
        <div class="userscard">
            <div>
                <h2>Cart Quantity</h2>
                <?php

                $sql = "SELECT SUM(cart.quantity) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $_SESSION['username'] . "'";
                $result = mysqli_query($db, $sql);
                $data = mysqli_fetch_assoc($result);
                $carttotal = $data['total'];

                ?>
                <h4>$<?php echo $carttotal ?></h4>
            </div>
        </div>
    </section>
    <section>
        <div class="userscard">
            <div>
                <h2>Cart Discount (5%)</h2>
                <?php

                $sql = "SELECT SUM(cart.itemprice * cart.quantity) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $_SESSION['username'] . "'";
                $result = mysqli_query($db, $sql);
                $data = mysqli_fetch_assoc($result);
                $carttotal = $data['total'];

                ?>
                <h4>$<?php echo $carttotal * 0.05 ?></h4>
            </div>
        </div>
    </section>
    <main>
        <div class="alert success" id="alertpopup">
            <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
            <strong>Success!</strong> Your Item has been removed from cart.
        </div>
        <div class="alert success" id="alertpopuporder">
            <span class="alertclosebtn" onclick="document.getElementById('alertpopuporder').style.display='none';">&times;</span>
            <strong>Success!</strong> Your Order has been placed.
        </div>
        <div class="tableoverflowdiv">
            <table id="review">
                <tr>
                    <th>Menu ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Delete</th>
                </tr>
                <?php

                $sql = "select * from cart";
                $result = mysqli_query($db, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['MenuID'] ?></td>
                            <input type="hidden" name="cartmenuid" value="<?php echo $row['MenuID']; ?>">
                            <td><?php echo $row['itemname'] ?></td>
                            <input type="hidden" value="<?php echo $row['itemname']; ?>" name="cartitemname">
                            <td><?php echo $row['Quantity'] ?></td>
                            <input type="hidden" value="<?php echo $row['Quantity']; ?>" name="cartquantity">
                            <td> <button id="menuitemedit" name="removefromcart" type="submit"> Remove
                                </button></td>
                        </form>
                        <?php $count = $count + 1; ?>
                    </tr>
                <?php }
                if ($count == 0) {
                    echo "<tr><td colspan='4'>No Rows to Display</td></tr>";
                }
                ?>
        </div>


        <form method="POST"> <input type="submit" name="ordernow" value="Order Now" class="addmenubutton"> </form>
    </main>
    <footer></footer>
    <script type="text/Javascript" src="../JS/script.js"></script>
</body>


<?php

if ($itemaddedflag == true) {
    echo "<script>alertpop();</script>";
    $itemaddedflag = false;
}
if ($orderedflag == true) {
    echo "<script>alertpoporder();</script>";
    $orderedflag = false;
}
?>

</html>