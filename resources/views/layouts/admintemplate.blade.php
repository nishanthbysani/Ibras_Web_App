<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>
    <script type="text/Javascript" src="/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
    <aside class="asidediv">
        @yield('sidenavbar')
    </aside>
    <header>
        <div class="topnav" id="myTopnav">
            <div class="dropdown">
                <button class="dropbtn" onclick="dropdownvisible()"> <i class="fas fa-user"></i> Welcome
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

    @yield('content')

    <footer>
        @yield('footer')
    </footer>
    <script src="/js/script.js"></script>
</body>

</html>