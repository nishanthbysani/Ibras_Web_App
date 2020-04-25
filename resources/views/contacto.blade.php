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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["contactosubmit"])) {
        if (isset($_POST['Name']) and empty($_POST['Name'])) {
            $error = "Name is empty";
        } else if (isset($_POST['Email']) and empty($_POST['Email'])) {
            $error = "Email is empty";
        } else if (isset($_POST['Email']) and  !filter_var(htmlspecialchars($_POST['Email']), FILTER_VALIDATE_EMAIL)) {
            $error = "Email is empty";
        } else if (isset($_POST['Subject']) and empty($_POST['Subject'])) {
            $error = "Subject is empty";
        } else if (isset($_POST['Subject']) and strlen($_POST['Subject']) > 100) {
            $error = "Subject is above 100 characters";
        } else if (isset($_POST['Message']) and empty($_POST['Message'])) {
            $error = "Message is empty";
        } else if (isset($_POST['Message']) and strlen($_POST['Message']) > 250) {
            $error = "Message is above 250 characters";
        } else {
            $sql = "insert into contact(`Name`,`Email`,`Subject`,`Message`)values('" . htmlspecialchars($_POST['Name']) . "','" . htmlspecialchars($_POST['Email']) . "','" . htmlspecialchars($_POST['Subject']) . "','" . htmlspecialchars($_POST['Message']) . "')";
            // echo $sql;
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alertpop();</script>";
            } else {
                $error = "Couldn't complete your request.";
            }
        }
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php"); ?>
    <title>Contacto</title>
</head>

<body>
    <!-- Main Header Div Container -->
    <div id="headcontainercontacto">
        <!-- Header containing both the image and nav bar -->
        <header id="headerIDinicio" class="headerContacto">
            <div class="topnav" id="myTopnav">
                <img id="navbaricon" src="..\Images\5.png" alt="logo" />
                <a href="../HTMl/Inicio.php">INICIO</a>
                <a href="../HTML/SobreNosotros.php">SOBRE NOSOTROS</a>
                <a href="../HTML/Menu.php">MENU</a>
                <a href="https://nxb4645.uta.cloud/blog/">BLOG</a>
                <a href="../HTML/Contacto.php" class="active">CONTACTO</a>
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
            <p id="headerdivline1">DI HOLA</p>
            <h2 id="headerdivline2">Contacto</h2>
        </div>
    </div>
    <div class="cut-border cut-bottom"></div>
    <main id="wrapper">
        <div id="ContactForm">
            <div id="FormImage">
                <img src="..\Images\Burguer.png" alt="">
                <h2>Di hola</h2>
                <h5>Di hola, envianos un mensaje</h5>
                <p>Envianos tus comentarios y sugurencias ustedes son importante para nosotros</p>
            </div>
            <form name="contactform" id="InlineForm" method="POST" onSubmit="return contactvalidate()">
                <div class="alert success" id="alertpopup">
                    <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
                    <strong>Success!</strong> Your query has been forwarded.
                </div>
                <div id="FormFirstLine">
                    <input type="text" name="Name" placeholder="Name" class="InlineForm" required>
                    
                    <input type="email" name="Email" placeholder="Email" class="InlineForm" required>
                    
                </div>
                <div id="FormSubject">
                    <input type="text" name="Subject" placeholder="Subject" min="1" max="100" required>
                    
                    <input type="textbox" name="Message" placeholder="Message" required min="1" max="250">
                    <div class="error" id="contactnameErr"></div>
                    <div class="error" id="contactemailErr"></div>
                    <div class="error" id="contactsubjectErr"></div>
                    <div class="error" id="contactmessageErr"></div>
                </div>
                <?php if (isset($error)) {
                    echo "<p style='color:red;text-align:center'>" . $error . "</p>";
                } ?>
                <div id="contactobuttonlocation">
                    <button id="iniciobannerbutton" type="submit" name="contactosubmit">Enviar mensaje</button>
                </div>
            </form>

        </div>
    </main>
    <footer id="footer">
        <div class="cut-border"></div>
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
                <h4 id="footercopyright">Copyright &copy;2020 Todos los derechos reservados | Este sitio esta hecho con &hearts; por DiazApps </h4>
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

    if (empty($error)) {
        echo "<script>alertpop();</script>";
    }

    ?>

</body>

</html>