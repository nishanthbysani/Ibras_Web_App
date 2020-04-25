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
// Check if the value is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from `menu` where MenuID=" . $id;
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $fetchedItemName = $row['itemname'];
        $fetchedItemPrice = $row['price'];
        $fetchedItemDescription = $row['description'];
        $fetchedItemNutrientFacts = $row['nutrientfacts'];
        break;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["updatemenuitem"])) {
        $sql = "update `menu` set `itemName`='" . $_POST['updatemenuitemname'] . "',`Price`='" . $_POST['updatemenuitemprice'] . "',`Description`='" . $_POST['updatemenuitemdescription'] . "',`nutrientfacts`='" . $_POST['updatemenuitemnutrientfacts'] . "' where MenuID='" . $id . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        // echo  $result;
        if ($result) {
            header("location: AdminmenuPage.php");
            exit;
        } else {
            $additemerror = "Unable to update the Item";
        }
    }

    if (isset($_POST["deletemenuitem"])) {
        $sql = "delete from `menu`  where MenuID='" . $id . "'";
        // echo $sql;
        $result = mysqli_query($db, $sql);
        // echo  $result;
        if ($result) {
            header("location: AdminmenuPage.php");
            exit;
        } else {
            $additemerror = "Unable to delete the Item";
        }
    }
    if (empty($_POST['menuitemname'])) {
        $additemerror = "Item Name is Empty";
        exit;
    } else if (empty($_POST['menuitemprice'])) {
        $additemerror = "Item Price is Empty";
        exit;
    } else if (!empty($_POST['menuitemname']) and !empty($_POST['menuitemprice'])) {
        $itemName = $_POST['menuitemname'];
        $itemPrice = $_POST['menuitemprice'];
        $itemDescription = $_POST['menuitemdescription'];
        $itemNutrientFacts = $_POST['menuitemnutrientfacts'];
        $sql = "Insert into `menu`(`itemName`,`Price`,`Description`,`nutrientfacts`) values('" . $itemName . "','" . $itemPrice . "','" . $itemDescription . "','" . $itemNutrientFacts . "')";
        $result = mysqli_query($db, $sql);
        if ($result > 0) {
            header("location: AdminmenuPage.php");
            exit;
        } else {
            $additemerror = "Unable to add the Item";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>


    <!-- <link rel="stylesheet" href="../CSS/ibras.css"> -->

</head>

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
        <div id="usercards">

            <?php
            $result = mysqli_query($db, "SELECT count(*) as total from menu ");
            $data = mysqli_fetch_assoc($result);
            $totalmenuitems = $data['total'];
            ?>
            <div class="userscard">
                <!-- <div> -->
                <h2>Total Menu Items</h2>

                <p class="menulatestburgerdivp2dashboard"><?php echo $totalmenuitems; ?></p>
                <!-- </div> -->
            </div>
        </div>

    </section>
    <section>
        <div id="usercards">

            <?php
            $result = mysqli_query($db, "SELECT MIN(price) as total from menu ");
            $data = mysqli_fetch_assoc($result);
            $totalmenuitems = $data['total'];
            ?>
            <div class="userscard">
                <!-- <div> -->
                <h2>Lowest Burger Price</h2>

                <p class="menulatestburgerdivp2dashboard">$<?php echo $totalmenuitems; ?></p>
                <!-- </div> -->
            </div>
        </div>
    </section>
    <section>
        <div id="usercards">

            <?php
            $result = mysqli_query($db, "SELECT MAX(price) as total from menu ");
            $data = mysqli_fetch_assoc($result);
            $totalmenuitems = $data['total'];
            ?>
            <div class="userscard">
                <!-- <div> -->
                <h2>Highest Burger Price</h2>

                <p class="menulatestburgerdivp2dashboard">$<?php echo $totalmenuitems; ?></p>
                <!-- </div> -->
            </div>
        </div>
    </section>
    <main>
        <button id="menumyBtn" class="addmenubutton">Add Item</button>

        <!-- The Modal -->
        <div id="menumyModal" class="menumodal">

            <!-- Modal content -->
            <div class="menumodal-content">
                <span class="menuclose"><a href="AdminMenuPage.php">&times;</a></span>
                <h3>Add Item</h3>


                <form onsubmit="return" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemname" class="addmenulabel">Item Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemname" name="menuitemname" class="addmenufield" placeholder="Item Name" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemprice" class="addmenulabel">Item Price</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemprice" name="menuitemprice" class="addmenufield" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemdescription" class="addmenulabel">Item Description</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemdescription" name="menuitemdescription" class="addmenufield"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemnutrientfacts" class="addmenulabel">Nutrient Facts</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemnutrientfacts" name="menuitemnutrientfacts" class="addmenufield"><br>
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" value="Add Item" class="addmenubutton">
                    </div>
                    <?php
                    if (!empty($additemerror)) {
                        echo "<p>" . $additemerror . "</p>";
                    }
                    ?>
                </form>
            </div>

        </div>




        <!-- Menu item Edit close -->
        <div id="usercards">
            <h3>Menu</h3>
            <?php
            $sql = "select * from `menu`";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="userscard">
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
                    </div>
                    <p id="userbuttoneffect"><a href="AdminMenuPage.php?id=<?php echo $row['MenuID']; ?>"><button id="menuitemedit"> Edit
                            </button></a></p>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Edit Menu Item -->
        <div id="updatemenumyModal" class="updatemenumodal">
            <!-- Modal content -->
            <div class="updatemenumodal-content">
                <span class="updatemenuclose"><a href="AdminMenuPage.php">&times;</a></span>
                <h3>Update Item</h3>
                <form onsubmit="return" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemname" class="addmenulabel">Item Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemname" name="updatemenuitemname" class="addmenufield" placeholder="Item Name" value="<?php echo $fetchedItemName; ?>" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemprice" class="addmenulabel">Item Price</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemprice" name="updatemenuitemprice" class="addmenufield" value="<?php echo $fetchedItemPrice; ?>" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemdescription" class="addmenulabel">Item Description</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemdescription" name="updatemenuitemdescription" class="addmenufield" value="<?php echo $fetchedItemDescription; ?>"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="menuitemnutrientfacts" class="addmenulabel">Nutrient Facts</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="menuitemnutrientfacts" name="updatemenuitemnutrientfacts" class="addmenufield" value=" <?php echo $fetchedItemNutrientFacts; ?>"><br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="submit" value="Delete" name="deletemenuitem" class="addmenubutton updatedelete">
                        <input type="submit" value="Update" name="updatemenuitem" class="addmenubutton ">

                    </div>
                    <?php
                    if (!empty($additemerror)) {
                        echo "<p>" . $additemerror . "</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php include('dashboardfooter.php'); ?>
    </footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

<?php

if (!empty($id)) {
    echo "<script>updatebuttonredirect();</script>";
}

?>

</html>