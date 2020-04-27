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
$error = '';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["profilesave"])) {
        if (isset($_POST["profilefullname"]) and isset($_POST["profileaddress"]) and isset($_POST["profilecity"]) and isset($_POST["profilecountry"]) and isset($_POST["profiletelephone"]) and isset($_POST["profileoccupation"]) and isset($_POST["profileworksat"])) {
            $sql = "update profile set FullName='" . $_POST["profilefullname"] . "',  address='" . $_POST["profileaddress"] . "', city='" . $_POST["profilecity"] . "' , country='" . $_POST["profilecountry"] . "', phonenumber='" . $_POST["profiletelephone"] . "', occupation='" . $_POST["profileoccupation"] . "', worksfor='" . $_POST["profileworksat"] . "' where emailid='" . $_SESSION["username"] . "'";
            // echo $sql;
            $result = mysqli_query($db, $sql);
            if ($result) {
            } else {
                $error = "Profile could not be updated";
            }
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

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
    <section></section>
    <section></section>
    <section></section>
    <main>
        <?php
        $sql = "select * from profile where emailid='" . $_SESSION['username'] . "'";
        $result = mysqli_query($db, $sql);
        // $count = 0;
        while ($row = mysqli_fetch_array($result)) { ?>
            <div id="dashboardadminright">
                <div id="dashboardpadding">
                    <h4>My Profile</h4>
                    <div class="myprofileclass" id="myprofilephoto"><i class="fas fa-user fa-6x"></i></div> <br><br><br>
                    <!-- <div class="myprofileclass"><h4>Manager</h4></div> -->
                    <form method="POST">
                        <div class="myprofileclass"><label>Full Name</label> <br><input type="text" name="profilefullname" value="<?php echo $row['FullName'] ?>" required></div>
                        <div class="myprofileclass"><label>Email ID</label> <br><input type="text" name="profileemailaddress" value="<?php echo $row['emailid'] ?>" readonly></div>
                        <div class="myprofileclass"><label>Address</label><br> <input type="text" name="profileaddress" value="<?php echo $row['emailid'] ?>"></div>
                        <div class="myprofileclass"><label>City</label><br> <input type="text" name="profilecity" value="<?php echo $row['city'] ?>" required></div>
                        <div class="myprofileclass"><label>Country</label><br> <input type="text" name="profilecountry" value="<?php echo $row['country'] ?>" required>
                        </div>
                        <!-- <div class="myprofileclass"><label>Zip Code</label><br> <input type="text" value="Zip Code"></div> -->
                        <div class="myprofileclass"><label>Phone Number</label><br> <input type="tel" name="profiletelephone" value="<?php echo $row['phonenumber'] ?>" required></div>
                        <div class="myprofileclass"><label>Occupation</label><br> <input type="tel" name="profileoccupation" value="<?php echo $row['occupation'] ?>" required></div>
                        <div class="myprofileclass"><label>Works at</label><br> <input type="tel" name="profileworksat" value="<?php echo $row['worksfor'] ?>" required></div>
                        <?php
                        if (!empty($error)) {
                            echo "<p>" . $error . "</p>";
                        }
                        ?>
                        <div class="myprofileclass" id="myprofilesavebutton"><button type="submit" name="profilesave" id="profilesave">Save</button></div>
                    </form>
                    <?php break; ?>
                </div>
            </div>
        <?php } ?>


    </main>
    <footer>   <?php include('dashboardfooter.php');?></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>