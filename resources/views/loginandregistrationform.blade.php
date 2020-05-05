<div id="id01" class="modal">
    <!-- Form -->
    <div>
        <!-- action="Dashboard_Admin.php" -->
        <form action="/inicio/login" name="loginform" class="modal-content animate" onSubmit="return loginvalidate()" method="post">
            @csrf
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
                <!-- <span class="close " onclick="document.getElementById('id01').style.display='none'">&times;</span> -->
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
                <p>
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
    <form action="/inicio/registration" name="registrationform" class="animate" method="post" onSubmit="return registerationvalidate()">
        @csrf
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
        <div class="modalFooterpopup">
            <button class="button1" type="submit">Cargar</button>
        </div>

    </form>

</div>
@if ($errors->any())
<div id="myModalerror" class="modalerror">

    <!-- Modal content -->
    <div class="modalerror-content">
        <div class="modalerror-header">
            <span class="closeerror" onclick="document.getElementById('myModalerror').style.display='none'">&times;</span>
            <h1 class='modelerrorstyle'>Error</h1>
        </div>
        <div class="modalerror-body">


            <ul>
                @foreach ($errors->all() as $error)
                <li class="errormessage"><span><i class="far fa-times-circle"></i></span> {{ $error }}</li>
                @endforeach
            </ul>

        </div>
        <!-- <div class="modalerror-footer">
            <h1 class='modelerrorstyle'>Please try again.</h1>
        </div> -->
    </div>
</div>
@endif
@if (Session::get('loginsuccessflag') == 'unsuccess')
<div id="myModalerror" class="modalerror">

    <!-- Modal content -->
    <div class="modalerror-content">
        <div class="modalerror-header">
            <span class="closeerror" onclick="document.getElementById('myModalerror').style.display='none'">&times;</span>
            <h1 class='modelerrorstyle'>Error</h1>
        </div>
        <div class="modalerror-body">
            <ul>
                <li class="errormessage"><span><i class="far fa-times-circle"></i></span> Invalid Username or Password</li>
            </ul>
        </div>
    </div>
</div>
@endif