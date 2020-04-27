<!DOCTYPE html>
<html lang="en">

<head>
    @extends('header')
    <title>Contacto</title>
</head>

<body>
    <!-- Main Header Div Container -->
    <div id="headcontainercontacto">
        <!-- Header containing both the image and nav bar -->
        <header id="headerIDinicio" class="headerContacto">
            <div class="topnav" id="myTopnav">
                <img id="navbaricon" src="..\Images\5.png" alt="logo" />
                <a href="inicio">INICIO</a>
                <a href="sobrenosotros">SOBRE NOSOTROS</a>
                <a href="menu">MENU</a>
                <a href="https://nxb4645.uta.cloud/blog/">BLOG</a>
                <a href="#" class="active">CONTACTO</a>
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
            <form action="/contacto" name="contactform" id="InlineForm" method="POST">
                <!-- onSubmit="return contactvalidate()" -->
                @csrf
                <!-- {{csrf_field()}} -->
                @if(session()->has('querystatus'))
                @if(Session::get('querystatus') == 'success')
                <div class="alert success" id="alertpopup">
                    <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
                    <strong>Success!</strong> Your query has been forwarded.
                </div>
                @elseif(Session::get('querystatus') == 'unsuccess')
                <div class="alert unsuccess" id="alertpopup">
                    <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
                    <strong>Success!</strong> Error during forwarding your query.
                </div>
                @endif
                @endif

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
                <div id="contactobuttonlocation">
                    <button id="iniciobannerbutton" type="submit" name="contactosubmit">Enviar mensaje</button>
                    <!-- <input type="submit" value="Submit"> -->
                </div>
            </form>

        </div>
    </main>
    <!-- Footer -->
    @extends('footer')
    @extends('loginandregistrationform')

</body>

<script type="text/Javascript" src="/js/script.js"></script>

</html>