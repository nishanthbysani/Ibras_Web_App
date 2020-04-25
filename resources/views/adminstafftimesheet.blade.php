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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/dashboard.css">
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
    <section></section>
    <section></section>
    <section></section>
    <main><br>
        <div class="row" style="text-align:center">
            <h2>Staff Timesheet</h2>
        </div>

        <br>
        <div class="tableoverflowdiv">
            <table id="review">
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Hours Clocked</th>
                    <th>Hours to be Clocked</th>
                </tr>
                <?php

                $sql = "select * from stafftimesheet";
                $result = mysqli_query($db, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['staffid'] ?></td>
                        <td><?php echo $row['staffname'] ?></td>
                        <td><?php echo $row['hoursclocked'] ?></td>
                        <td><?php echo $row['hourstobeclocked'] ?></td>
                        <?php $count = $count + 1; ?>
                    </tr>
                <?php }
                if ($count == 0) {
                    echo "<tr><td colspan='9'>No Rows to Display</td></tr>";
                }
                ?>
        </div>
    </main>
    <footer></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>