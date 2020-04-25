<?php
// include('loginregistrationvalidation.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php"); ?>
    <title>Inicio</title>
</head>

<body>
    <div id="MainBodyContainer">
        <!-- Main Header Div Container -->
        <div id="headcontainerinicio">
            <!-- Header containing both the image and nav bar -->
            <div>
                <header id="headerIDinicio">
                    <div class="topnav" id="myTopnav">
                        <img id="navbaricon" src="..\Images\5.png" alt="logo" />
                        <a href="#" class="active">INICIO</a>
                        <a href="../HTML/SobreNosotros.php">SOBRE NOSOTROS</a>
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
            </div>
            <!-- Header apart from the nav bar -->
            <div id="remainingcontainerinicio">
                <h5 id="headerdivline1inicio">LAS MEJORES DE LA CIUDAD</h5>
                <h2 id="headerdivline2inicio">Hamburguesas</h2>
                <div id="inicionuttonlocation">
                    <button id="iniciobannerbutton">VER MENÚ HOY</button>
                </div>
            </div>
        </div>
        <div class="cut-border cut-bottom"></div>
        <!-- Main Body -->
        <main>
            <div id="maindivhistory">
                <div id="mainstoryleftimg">
                </div>
                <div id="wrapper">
                    <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg">
                    <h3 id="maindivstyle">Nuestra historia</h3>
                    <div class="maindivinformation1">
                        <p>Los orígenes se remontan al 10 de junio de 1960, cuando Ibrahim Mata compraron la
                            Hamburgueseria
                            “Soy Yo” con una inversión inicial de 950 dólares. El local estaba situado en Lecheria, y la
                            idea de Ibrahim era vender Hamburguesas a domicilio a las personas de las residencias
                            cercanas.
                            Aquella experiencia no marchaba como tenían previsto.</p>
                    </div>
                    <div class="maindivinformation2">
                        <p>A pesar de todo, Ibrahim se mantuvo al frente del restaurante y tomó decisiones importantes
                            para
                            su futuro, como reducir la carta de productos y establecer un reparto a domicilio gratuito.
                            Después de adquirir dos restaurantes más en Barcelona, en 1965 renombró sus tres locales
                            como
                            Ibra's Burger Grill.</p>
                    </div>
                </div>
                <div id="mainstoryrightimg">
                </div>
            </div>

        </main>
        <!-- menu -->
        <div id="maindivmenu">
            <div id="maindivmenubackground">
                <div id="wrapper">
                    <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg">
                    <h3 id="maindivstyle">Las más vendidos</h3>
                    <div id="iniciolatestburgersdiv">
                        <div>
                            <img src="..\Images\burguer1.png" alt="">
                            <p class="iniciolatestburgersdivp">Mixta</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="iniciolatestburgersdivp">Pollo</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer3.png" alt="">
                            <p class="iniciolatestburgersdivp">Carne</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="iniciolatestburgersdivp">Pollo</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                    </div>
                    <div id="iniciolatestburgersdiv">
                        <div>
                            <img src="..\Images\burguer1.png" alt="">
                            <p class="iniciolatestburgersdivp">Mixta</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="iniciolatestburgersdivp">Pollo</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer3.png" alt="">
                            <p class="iniciolatestburgersdivp">Carne</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                        <div>
                            <img src="..\Images\burguer2.png" alt="">
                            <p class="iniciolatestburgersdivp">Pollo</p>
                            <p class="iniciomenuprices">$11.90</p>
                            <button class="iniciomenuorderbutton">
                                <p>Ordenar ahora</p>
                            </button>
                        </div>
                    </div>
                    <div id="iniciomenubannerbutton">
                        <button id="iniciobannerbutton">VER MENÚ HOY</button>
                    </div>
                </div>
            </div>
            <div class="cut-border cut-bottom"></div>

        </div>
        <!-- Footer Starts -->
        <?php include("footer.php"); ?>
    </div>
    <div id="id01" class="modal">
        <!-- Form -->
        <div>
            <!-- action="Dashboard_Admin.php" -->
            <form name="loginform" class="modal-content animate" onSubmit="return loginvalidate()" method="post">

                <div class="modalHeaderPopup">
                    <span class="close " onclick="document.getElementById('id01').style.display='none'">&times;</span>

                    <header id="modalheadinginiciarsesion">
                        <img src="..\Images\Burguer.png" alt="" id="maindivburgerimg" class="modalclassinline">
                        <h2 class="modalclassinlinepopup">Iniciar Sesion</h2>
                        <!-- <span class="close " onclick="document.getElementById('id01').style.display='none'">&times;</span> -->
                    </header>
                </div>
                <hr>
                <div class="modalBodypopup container">
                    <span class="close " onclick="document.getElementById('id01').style.display='none'">&times;</span>
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
                    <!-- <div id="LoginMessage" style="display:none">
                        <h3>Password must contain the following: A lowercase, An uppercase</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div> -->
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
        <form name="registrationform" class="animate" method="post" onSubmit="return registerationvalidate()">
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
                    <div class="error" id="fullnameErr"></div>
                </div>
                <div class="loginForm">
                    <label>Correo:</label><br>
                    <input type="email" name="registeremail" title="Email" required>
                    <div class="error" id="emailErr"></div>

                </div>
                <div class="loginForm">
                    <label>Contraseña:</label><br>
                    <input type="password" name="registerpassword" title="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}" required>
                    <div class="error" id="registerpasswordErr"></div>
                </div>
                <div class="loginForm">
                    <label>Repetir Contraseña:</label><br>
                    <input type="password" name="registerrepeatpassword" title="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?:{}|<>]).{8,10}" required>
                    <div class="error" id="repeatpasswordErr"></div>
                </div>
                <div class="loginForm">
                    <label>Direccion:</label><br>
                    <input type="text" name="registeraddress" title="Address" required>
                    <div class="error" id="addressErr"></div>

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
<script type="text/Javascript" src="/js/script.js"></script>


</html>