<?php
include("config.php");
include('loginregistrationvalidation.php');
if (session_id() == '') {
    session_start();
    $_SESSION['loginerrorFlag'] = FALSE;
    $_SESSION['registererrorFlag'] = FALSE;
}
$error = '';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php"); ?>
    <title>Sobre Nosotros</title>
</head>

<body>
    <!-- Main Header Div Container -->
    <div id="headcontainerSobrenosotros">
        <!-- Header containing both the image and nav bar -->
        <header id="headerIDinicio">
            <div class="topnav" id="myTopnav">
                <img id="navbaricon" src="..\Images\5.png" alt="logo" />
                <a href="../HTML/Inicio.php">INICIO</a>
                <a href="../HTML/SobreNosotros.php" class="active">SOBRE NOSOTROS</a>
                <a href="../HTML/Menu.php">MENU</a>
                <a href="https://nxb4645.uta.cloud/blog/">BLOG</a>
                <a href="../HTML/Contacto.php">CONTACTO</a>
                <a href="#" onclick="document.getElementById('registropopupmargin').style.display='block'">REGISTRO</a>
                <a href="#" onclick="document.getElementById('id01').style.display='block'">INICIAR SESSION</a>
                <!-- <button type="button" onclick="document.getElementById('registropopupmargin').style.display='block'" style="width:auto;">REGISTRO</button></li>
                        <button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">INICIAR SESSION</button></li> -->
                <a href="javascript:void(0);" class="icon" onclick="navbarfunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </header>
        <div class="cut-border"></div>
        <!-- Header apart from the nav bar -->
        <div id="remainingcontainer">
            <h5 id="headerdivline1">LAS MEJORES DE LA CIUDAD</h5>
            <h2 id="headerdivline2">Sobre nuestras Hamburguesas</h2>
        </div>
    </div>
    <div class="cut-border cut-bottom"></div>
    <!-- Main Body -->
    <main id="wrapper">
        <div id="sobremaincontaineraboutus">
            <div id="sobremaincontainerimages">
                <img src="../Images/hamburguesa1.jpg" alt="">
                <img src="../Images/hamburguesa2.jpg" alt="">
            </div>
            <h2 id="headerdivline2">Somos Ibra</h2>
            <div id="sobremaincontainerinfo1">
                <p>
                    Al comenzar el dia, cada mañana estamos más que preparándonos para dar lo mejor de nosotros mismos.
                </p>
                <p>
                    Porque cada uno de nuestros clientes nos inspira a trabajar en pro del mejor servicio, las mejores
                    entregas y, sobre todo, las mejores Hamburguesas..
                </p>
            </div>
            <div id="sobremaincontainerinfo2">
                <p>Los orígenes se remontan al 10 de junio de 1960, cuando Ibrahim Mata compraron la pizzería
                    DomiPizza's, con una inversión inicial de 950 dólares. El local estaba situado en Lecheria, y la
                    idea de Ibrahim era vender Hamburguesas a domicilio a las personas de las residencias cercanas.
                    Aquella experiencia no marchaba como tenían previsto.</p>
                <p>A pesar de todo, Ibrahim se mantuvo al frente del restaurante y tomó decisiones importantes para su
                    futuro, como reducir la carta de productos y establecer un reparto a domicilio gratuito. Después de
                    adquirir dos restaurantes más en Barcelona, en 1965 renombró sus tres locales como Ibra's Burger
                    Grill.
                </p>
            </div>
            <div id="sobresmaincontainerbuttons">
                <div id="inicionuttonlocation">
                    <button id="sobresbannerbutton">VER MENÚ HOY</button>
                </div>
                <div id="inicionuttonlocation">
                    <button id="Sobresbannerbutton">PEDIR AHORA</button>
                </div>
            </div>

        </div>
    </main>
    <!-- </div> -->
    <div id="sobresclientinformationdiv">
        <div id='sobresclientinformationdivbackground'>
            <div> <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg"></div>
            <h2 id="headerdivline2">Lo que dicen los clientes</h2>
            <div id="clientsinfo">
                <div>
                    <h4>Las Mejores Hamburguesas</h4>
                    <p>Me gustan sus Hamburguesas, siempre seran mi lugar de encuetros y buenos recuerdas
                        acompañados de la mejor Hamburguesa</p>
                    <img src="../Images/client1.jpg" alt="">
                    <p><span class="clientnamehighlight">Daiane Smith</span>,Cliente</p>
                </div>
                <div>
                    <h4>Las Mejores Hamburguesas</h4>
                    <p>Me gustan sus Hamburguesas, siempre seran mi lugar de encuetros y buenos recuerdas
                        acompañados de la mejor Hamburguesa</p>
                    <img src="../Images/client2.jpg" alt="">
                    <p><span class="clientnamehighlight">Michael Williams</span>,Cliente</p>
                </div>
                <div>
                    <h4>Las Mejores Hamburguesas</h4>
                    <p>Me gustan sus Hamburguesas, siempre seran mi lugar de encuetros y buenos recuerdas
                        acompañados de la mejor Hamburguesa</p>
                    <img src="../Images/client3.jpg" alt="">
                    <p><span class="clientnamehighlight">Shawn Gaines</span>,Cliente</p>
                </div>
            </div>
        </div>
        <div class="cut-border cut-bottom"></div>

    </div>



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
                <div id="socialnetworking"><i class="fab fa-pinterest"></i><i class="fab fa-facebook-f"></i><i class="fab fa-twitter"></i><i class="fas fa-basketball-ball"></i><i class="fab fa-linkedin"></i><i class="fab fa-vimeo-v"></i></div>

            </div>
            <div>
                <h4 id="footercopyright">Copyright &copy;2020 Todos los derechos reservados | Este sitio esta hecho con
                    &hearts; por DiazApps
                </h4>
            </div>

        </div>
    </footer>
    <div id="id01" class="modal">
        <!-- Form -->
        <div>
            <!-- action="Dashboard_Admin.php" -->
            <form name="loginform" class="modal-content animate" onSubmit="return loginvalidate()" method="post">
                <div class="modalHeaderPopup">
                    <header id="modalheadinginiciarsesion">
                        <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg" class="modalclassinline">
                        <h2 class="modalclassinlinepopup">Iniciar Sesion</h2>
                        <span class="close " onclick="document.getElementById('id01').style.display='none'">&times;</span>
                    </header>
                </div>
                <hr>
                <div class="modalBodypopup container">
                    <div class="loginForm">
                        <label>Usuario:</label><br>
                        <input type="email" name="username" id="loginusername" required>
                        <!-- <input type="text" name="username" id="loginusername"> -->
                        <div class="error" id="usernameErr"></div>
                    </div>
                    <div class="loginForm">
                        <label>Contraseña:</label><br>
                        <input type="password" name="password" id="loginpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}" required>
                        <!-- <input type="password" name="password" id="loginpassword"> -->
                        <div class="error" id="passwordErr"></div>
                    </div>
                    <div id="LoginMessage" style="display:none">
                        <h3>Password must contain the following: A lowercase, An uppercase</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <p>
                        <?php
                        if ($_SESSION['loginerrorFlag'] == TRUE) {
                            echo "<p id='errormessage'>" . $error . "</p>";
                        } ?>
                    </p>
                    <!-- Horizontal Line -->
                    <hr>
                    <button class="button1" type="submit">Entrar</button>
                    <!-- <div class="modalFooterpopup"> -->
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
    <!-- <div id="registerdivmodalpage"> -->
    <div class="modalpopup registration-page" id="registropopupmargin">
        <form class="animate" method="post">
            <div class="modalHeaderPopup">
                <header id="modalheadinginiciarsesion">
                    <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg" class="modalclassinline">
                    <h2 class="modalclassinlinepopup">Registro de Usario</h2>
                    <span class="close modalclassinlinepopup" onclick="document.getElementById('registropopupmargin').style.display='none'">&times;</span>
                </header>
            </div>
            <!-- Horizontal Line -->
            <hr>
            <div class="modalBodypopup">
                <div class="loginForm">
                    <label>Nombre y apellido:</label><br>
                    <input type="text" name="registerfullname" title="Full Name" required>
                </div>
                <div class="loginForm">
                    <label>Correo:</label><br>
                    <input type="email" name="registeremail" title="Email" required>
                </div>
                <div class="loginForm">
                    <label>Contraseña:</label><br>
                    <input type="password" name="registerpassword" title="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}" required>
                </div>
                <div class="loginForm">
                    <label>Repetir Contraseña:</label><br>
                    <input type="password" name="registerrepeatpassword" title="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}" required>
                </div>
                <div class="loginForm">
                    <label>Direccion:</label><br>
                    <input type="text" name="registeraddress" title="Address" required>
                </div>

                <div>

                    <input type="radio" name="registerusertype" id="registerradio1" value="1"><label for="registerradio1">Customer</label><br>
                    <input type="radio" name="registerusertype" id="registerradio2" value="2" checked><label for="registerradio2">Admin</label><br>

                </div>
            </div>
            <!-- Horizontal Line -->
            <hr>
            <?php
            if ($_SESSION['registererrorFlag'] == TRUE) {
                echo "<p id='errormessage'>" . $error . "</p>";
            } ?>
            <div class="modalFooterpopup">
                <button class="button1" type="submit">Cargar</button>
            </div>

        </form>

    </div>
    <!-- </div> -->
    <?php

    if ($_SESSION['loginerrorFlag'] == TRUE) {
        echo '<script type="text/javascript"> enablePopUp(); </script>';
        $_SESSION['loginerrorFlag'] = FALSE;
    }
    if ($_SESSION['registererrorFlag'] == TRUE) {
        echo '<script type="text/javascript"> enableRegisterPopUp(); </script>';
        $_SESSION["registererrorFlag"] = FALSE;
    }
    ?>
</body>

</html>