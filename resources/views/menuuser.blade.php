<?php
include("config.php");

session_start();
$_SESSION['loginerrorFlag'] = FALSE;
$_SESSION['registererrorFlag'] = FALSE;
//  if (!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] === FALSE) {
//      header("location: Inicio.php#");
//      exit;
//  }
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
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["updatemenuitem"])) {
        $sql = "update `menu` set `itemName`='" . $_GET['updatemenuitemname'] . "',`Price`='" . $_GET['updatemenuitemprice'] . "',`Description`='" . $_GET['updatemenuitemdescription'] . "',`nutrientfacts`='" . $_GET['updatemenuitemnutrientfacts'] . "' where MenuID='" . $id . "'";
        echo $sql;
        $result = mysqli_query($db, $sql);
        echo  $result;
        if ($result) {
            header("location: Menu_User.php");
            exit;
        } else {
            $additemerror = "Unable to get the Item";
        }
    }

    if (isset($_POST["updateorder"])) {
        $sql = "update 'orderitems' set MenuID='" . $id . "','quantity'= 1";
        echo $sql;
        $result = mysqli_query($db, $sql);
        echo  $result;
        if ($result) {
            header("location: Cart.php");
            exit;
        } else {
            $additemerror = "Unable to add the Item";
        }
    }
    if (empty($_POST['menuitemname'])) {
        $additemerror = "Item Name is Empty";
        exit;
    } else if (empty($_POST['menuitemprice'])) {
        $additemerror = "Item Price is Empty";
    } else if (!empty($_POST['menuitemname']) and !empty($_POST['menuitemprice'])) {
        $itemName = $_GET['menuitemname'];
        $itemPrice = $_GET['menuitemprice'];
        $itemDescription = $_GET['menuitemdescription'];
        $itemNutrientFacts = $_GET['menuitemnutrientfacts'];
        $sql = "Insert into `menu`(`itemName`,`Price`,`Description`,`nutrientfacts`) values('" . $itemName . "','" . $itemPrice . "','" . $itemDescription . "','" . $itemNutrientFacts . "')";
        $result = mysqli_query($db, $sql);
        if ($result > 0) {
            header("location: Menu_User.php");
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
    <link rel="stylesheet" href="../CSS/ibras.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f30b51250.js" crossorigin="anonymous"></script>
    <link href="https://db.onlinewebfonts.com/c/41f5e8ff1d98d490a19c6d48ea7b74b1?family=Beyond+The+Mountains" rel="stylesheet" type="text/css"/>
    <title>Menu</title>
</head>

<body>
    <!-- Main Header Div Container -->
    <div id="headcontainermenu">
        <!-- Header containing both the image and nav bar -->
        <header id="headerID">
        
            <nav class="navigation-bar">
                <img  href = "../HTML/Customer.php" src="..\Images\5.png" alt="logo" />
                <ul id="headernavigationcontainer">
                    <li class="navigation"><a href="Inicio.html">INCIO</a></li>
                    <li class="navigation"><a href="#">SOBRE NOSOTROS</a></li>
                    <li class="navigation" id="selectedpagecolor"><a href="#">MENU</a></li>
                    <li class="navigation"><a href="https://nxb4645.uta.cloud/blog/">BLOG</a></li>
                    <li class="navigation"><a href="../HTML/Contacto.html">CONTACTO</a></li>
                    <li class="navigation"><a href="../HTML/Registro.html">REGISTRO</a></li>
                    <li class="navigation"><a href="../HTML/Iniciar Sesion.html">INICIAR SESION</a></li>
                    <li class="navigation"><a href="../HTML/Customer.html">Dashboard</a></li>
                </ul>
                <div class="dropdown">

                <button class="dropbtn"> <i class="fas fa-user"></i> Welcome <?php echo $_SESSION['username'];  ?>

                </button>
                <div class="dropdown-content">
                    <a href="../HTML/AdminMyProfile.php">My Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </nav>
        </header>
        <div class="cut-border"></div>
        <!-- Header apart from the nav bar -->
        <div id="remainingcontainer">
            <h5 id="headerdivline1">LAS MEJORES DE LA CIUDAD</h5>
            <h2 id="headerdivline2">Menú</h2>
        </div>
    </div>
    <div class="cut-border cut-bottom"></div>
    <?php
            $sql = "select * from `menu`";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
    <!-- Main Body -->

    <div id="usercards">
            <h3>Menu</h3>
            
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
                    <p id="iniciomenuorderbutton"><a href="Menu_User.php?id=<?php echo $row['MenuID']; ?>"><button id="updateorder"> Cart
                            </button></a></p>
                </div>
            <?php
            }
            ?>
        </div>







    <main id="wrapper">
        <div id="menumaindiv">

            <h3>Elija su Hamburguesa</h3>
            <!-- Trending burgers -->
            <div id="menulatestburgersdiv">
                <div>
                    <img src="..\Images\burguer1.png" alt="">
                    <p class="menulatestburgerdivp">Mixta</p>
                    <span>
                        <p class="menulatestburgerdivp2">$11.90</p>
                        <button class="iniciomenuorderbutton">Add to Cart</button>
                    </span>

                </div>
                <div>
                    <img src="..\Images\burguer2.png" alt="">
                    <p class="menulatestburgerdivp">Pollo</p>
                    <span>
                        <p class="menulatestburgerdivp2">$11.90</p>
                        <button class="iniciomenuorderbutton">Add to Cart</button>
                    </span>
                </div>
                <div>
                    <img src="..\Images\burguer3.png" alt="">
                    <p class="menulatestburgerdivp">Carne</p>
                    <span>
                        <p class="menulatestburgerdivp2">$11.90</p>
                        <button class="iniciomenuorderbutton">Add to Cart</button>
                    </span>
                </div>
                <div>
                    <img src="..\Images\burguer2.png" alt="">
                    <p class="menulatestburgerdivp">Pollo</p>
                    <span>
                        <p class="menulatestburgerdivp2">$11.90</p>
                        <button class="iniciomenuorderbutton" >Add to Cart</button>
                    </span>
                </div>
            </div>
            <!-- Total menu -->
            <div id="menuremainingburgersdiv">
                <div class="menuremainingburgersdivrow">
                    <table>
                        <!-- Row 1 -->
                        <tr>
                            <td><img src="..\Images\hamburguesa21.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Pollo</p>
                            </td>
                            <td>
                                <span>
                                    <p class="menuremainingburgersp">$12.00</p>
                                    <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                </span>
                            </td>
                            <td><img src="..\Images\hamburguesa20.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Mixta</p>
                            </td>
                            <td>
                            <span>
                                    <p class="menuremainingburgersp">$20.00</p>
                                    <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                </span>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td><img src="..\Images\hamburguesa18.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Carne</p>
                            </td>
                            <td>
                            <span>
                                    <p class="menuremainingburgersp">$12.00</p>
                                    <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                </span>
                            </td>
                            <td><img src="..\Images\hamburguesa16.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Pollo</p>
                            </td>
                            <td>
                                
                                <p class="menuremainingburgersp">$6.00</p>
                                <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td><img src="..\Images\hamburguesa13.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp"> de todito</p>
                            </td>
                            <td>
                                
                                <p class="menuremainingburgersp">$12.00</p>
                                <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                                            </td>
                            <td><img src="..\Images\hamburguesa12.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Mixta</p>
                            </td>
                            <td>                                
                                <p class="menuremainingburgersp">$20.00</p>
                                <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td><img src="..\Images\hamburguesa10.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Carne</p>
                            </td>
                            <td>                                
                                <p class="menuremainingburgersp">$12.00</p>
                                <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                                
                            </td>
                            <td><img src="..\Images\hamburguesa4.jpg" alt=""></td>
                            <td width="30%">
                                <p class="menulatestburgerdivp">Pollo</p>
                            </td>
                            <td>
                                <p class="menuremainingburgersp">$12.00</p>
                                <button class="iniciomenuorderbutton" type="$_POST">Cart</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Starts -->
    <footer id="footer">
        <div id="footerdiv">
            <div id="footerdivcontent">
                <div> <img src="..\Images\5.png" alt=""> </div>
                <div class="footertexthighlighted">
                    <h4>Habla a:</h4>
                </div>
                <div class="footertextnormal">
                    <h4>Av. Intercomunal, sector la Mora, calle 8</h4>
                </div>
                <div class="footertexthighlighted">
                    <h4>Telefono:</h4>
                </div>
                <div class="footertextnormal">
                    <h4>+58 251 261 00 01</h4>
                </div>
                <div class="footertexthighlighted">
                    <h4>Correo:</h4>
                </div>
                <div class="footertextnormal">
                    <h4>yourmail@gmail.com</h4>
                </div>
                <div id="socialnetworking"><i class="fab fa-pinterest"></i><i class="fab fa-facebook-f"></i><i
                        class="fab fa-twitter"></i><i class="fas fa-basketball-ball"></i><i
                        class="fab fa-linkedin"></i><i class="fab fa-vimeo-v"></i></div>

            </div>
            <div>
                <h4 id="footercopyright">Copyright &copy;2020 Todos los derechos reservados | Este sitio esta hecho con &hearts; por DiazApps
                    </h4>
            </div>

        </div>
    </footer>

</body>

<!-- <?php

if (!empty($id)) {
    echo "<script>updatebuttonredirect();</script>";
}

?> -->
</html>