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
    <section></section>
    <section></section>
    <section></section>
    <main><br>
        <div class="row" style="text-align:center">
            <h2>Enquiries</h2>
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
                    <th>Contact ID</th>
                    <!-- <th>Name</th> -->
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Enquiry Time</th>
                    <th>Resolution Status</th>
                    <th>Resolved By</th>
                    <th>Comments</th>
                    <th>Last Updated</th>
                </tr>
                <?php
                if (isset($_POST["pending"])) {
                    $sql = "select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=0";
                    $result = mysqli_query($db, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['ContactID'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Subject'] ?></td>
                            <td><?php echo $row['Message'] ?></td>
                            <td><?php echo $row['enquiretime'] ?></td>

                            <td><?php if ($row['isresolved'] == 0) {
                                    echo "Not Resolved";
                                } else {
                                    echo "Resolved";
                                }
                                ?></td>
                            <td><?php if (empty($row['resolvedby'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolvedby'];
                                } ?></td>
                            <td><?php if (empty($row['resolutioncomments'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolutioncomments'];
                                } ?></td>
                            <td><?php echo $row['lastupdated'] ?></td>
                            <?php $count = $count + 1; ?>
                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo "<tr><td colspan='9'>No Rows to Display</td></tr>";
                    }
                } else if (isset($_POST["completed"])) {
                    $sql = "select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=1";
                    $result = mysqli_query($db, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['ContactID'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Subject'] ?></td>
                            <td><?php echo $row['Message'] ?></td>
                            <td><?php echo $row['enquiretime'] ?></td>

                            <td><?php if ($row['isresolved'] == 0) {
                                    echo "Not Resolved";
                                } else {
                                    echo "Resolved";
                                }
                                ?></td>
                            <td><?php if (empty($row['resolvedby'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolvedby'];
                                } ?></td>
                            <td><?php if (empty($row['resolutioncomments'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolutioncomments'];
                                } ?></td>
                            <td><?php echo $row['lastupdated'] ?></td>
                            <?php $count = $count + 1; ?>
                        </tr>
                    <?php }
                    if ($count == 0) {
                        echo "<tr><td colspan='9'>No Rows to Display</td></tr>";
                    }
                } else {
                    $sql = "select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact";
                    $result = mysqli_query($db, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['ContactID'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Subject'] ?></td>
                            <td><?php echo $row['Message'] ?></td>
                            <td><?php echo $row['enquiretime'] ?></td>

                            <td><?php if ($row['isresolved'] == 0) {
                                    echo "Not Resolved";
                                } else {
                                    echo "Resolved";
                                }
                                ?></td>
                            <td><?php if (empty($row['resolvedby'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolvedby'];
                                } ?></td>
                            <td><?php if (empty($row['resolutioncomments'])) {
                                    echo "null";
                                } else {
                                    echo $row['resolutioncomments'];
                                } ?></td>
                            <td><?php echo $row['lastupdated'] ?></td>
                            <?php $count = $count + 1; ?>
                        </tr>
                <?php }
                    if ($count == 0) {
                        echo "<tr><td colspan='9'>No Rows to Display</td></tr>";
                    }
                } ?>
        </div>
    </main>
    <!-- <footer> <?php include('dashboardfooter.php');?></footer> -->
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>