<!DOCTYPE html>
<html lang="en">

<head>
    @extends('header')
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
                        <a href="sobrenosotros">SOBRE NOSOTROS</a>
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
                    <!-- </nav> -->

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
        @extends('footer')
    </div>
    @extends('loginandregistrationform')

</body>

<script type="text/Javascript" src="/js/script.js"></script>
@if ($errors->any())
    @php echo "<script>
        activatemodelerror();
    </script>" @endphp
    @endif
</html>