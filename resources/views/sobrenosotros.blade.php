<!DOCTYPE html>
<html lang="en">

<head>
    @extends('header')
    <title>Sobre Nosotros</title>
</head>

<body>
    <!-- Main Header Div Container -->
    <div id="headcontainerSobrenosotros">
        <!-- Header containing both the image and nav bar -->
        <header id="headerIDinicio">
            <div class="topnav" id="myTopnav">
                <img id="navbaricon" src="..\Images\5.png" alt="logo" />
                <a href="inicio">INICIO</a>
                <a href="#" class="active">SOBRE NOSOTROS</a>
                <a href="menu">MENU</a>
                <a href="https://nxb4645.uta.cloud/blog/">BLOG</a>
                <a href="contacto">CONTACTO</a>
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
        @extends('footer')

        @extends('loginandregistrationform')

</body>

</html>