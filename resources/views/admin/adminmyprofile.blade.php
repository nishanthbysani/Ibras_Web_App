@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
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
<footer> <?php include('dashboardfooter.php'); ?></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>