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
        @yield('customersidenavbar')
    </aside>
    <header>
        <div class="topnav" id="myTopnav">
            <div class="dropdown">
                <button class="dropbtn" onclick="dropdownvisible()"> <i class="fas fa-user"></i> Welcome  {{session()->get('loggedinusername')}}
                </button>
                <div class="dropdown-content">
                    <a href="../HTML/CustomerMyProfile.php">My Profile</a>
                    <p><a href="/customerhome" class="navbarhiddenfields">Menu</a></p>
                    <p><a href="../HTML/CustomerCartPage.php" class="navbarhiddenfields">Cart</a></p>
                    <p><a href="../HTML/CustomerOrdersPage.php" class="navbarhiddenfields">Orders</a></p>
                    <!-- <a href="../HTML/CustomerOrdersPage.php" class="navbarhiddenfields">Enquiries</a> -->
                    <a href="/logout">Logout</a>
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