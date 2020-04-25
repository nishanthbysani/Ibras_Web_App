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