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

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     if (isset($_POST["pending"])) {
//         $sql = "select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, users b where a.UserID=b.UserID where a.isfeedbackprovided='Pending'";
//         $result = mysqli_query($db, $sql);
//     } else {
//         $sql = "select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, users b where a.UserID=b.UserID where a.isfeedbackprovided='Completed'";
//         $result = mysqli_query($db, $sql);
//     }
// }
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
            <h2>Order Reviews</h2>
        </div>
        <form method="POST">
            <div class="row">
                <input type="submit" value="Pending" name="pending" class="addmenubutton">
                <input type="submit" value="Completed" name="completed" class="addmenubutton ">
            </div>
        </form>
        <br>
        <div class="tableoverflowdiv">
            <table id="review">
                <tr>
                    <th>Feedback ID</th>
                    <th>Order ID</th>
                    <th>Comments</th>
                    <th>Ratings</th>
                    <th>User ID</th>
                    <th>Feedback Time</th>
                    <th>Feedback Provided?</th>

                </tr>
                <?php
                if (isset($_POST["pending"])) {
                    $sql = "select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, users b where a.UserID=b.UserID and a.isfeedbackprovided=0";
                    $result = mysqli_query($db, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['FeedbackID'] ?></td>
                            <td><?php echo $row['OrderID'] ?></td>
                            <td><?php if (empty($row['Comments'])) {
                                    echo "null";
                                } else {
                                    echo $row['Comments'];
                                }
                                ?></td>
                            <td><?php if (empty($row['Ratings'])) {
                                    echo "null";
                                } else {
                                    echo $row['Ratings'];
                                } ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['feedbacktime'] ?></td>
                            <td><?php
                                if ($row['isfeedbackprovided'] == 0) {
                                    echo "Pending";
                                } else {
                                    echo "Completed";
                                }
                                ?></td>
                            <?php $count = $count + 1; ?>
                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo "<tr><td colspan='7' align='center'>No Rows to Display</td></tr>";
                    }
                } else if (isset($_POST["completed"])) {
                    $sql = "select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, users b where a.UserID=b.UserID and a.isfeedbackprovided=1";
                    $result = mysqli_query($db, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['FeedbackID'] ?></td>
                            <td><?php echo $row['OrderID'] ?></td>
                            <td><?php if (empty($row['Comments'])) {
                                    echo "null";
                                } else {
                                    echo $row['Comments'];
                                }
                                ?></td>
                            <td><?php if (empty($row['Ratings'])) {
                                    echo "null";
                                } else {
                                    echo $row['Ratings'];
                                } ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['feedbacktime'] ?></td>
                            <td><?php
                                if ($row['isfeedbackprovided'] == 0) {
                                    echo "Pending";
                                } else {
                                    echo "Provided";
                                }
                                ?></td>
                            <?php $count = $count + 1; ?>
                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo "<tr><td colspan='7' align='center' >No Rows to Display</td></tr>";
                    }
                } else {
                    $sql = "select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, users b where a.UserID=b.UserID";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['FeedbackID'] ?></td>
                            <td><?php echo $row['OrderID'] ?></td>
                            <td><?php if (empty($row['Comments'])) {
                                    echo "null";
                                } else {
                                    echo $row['Comments'];
                                }
                                ?></td>
                            <td><?php if (empty($row['Ratings'])) {
                                    echo "null";
                                } else {
                                    echo $row['Ratings'];
                                } ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['feedbacktime'] ?></td>
                            <td><?php
                                if ($row['isfeedbackprovided'] == 0) {
                                    echo "Pending";
                                } else {
                                    echo "Provided";
                                }
                                ?></td>
                        </tr>
                <?php }
                } ?>
        </div>
    </main>
    <footer></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>