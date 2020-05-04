@extends('layouts.usertemplate')
@extends('customer.customersidenavbar')
@extends('customer.dashboardfooter')
@section('content')
<section class='sectionclass'>
    <div id="usercards">
        <div class="userscard">
            <!-- <div> -->
            <h2>Total Menu Items</h2>

            <p class="menulatestburgerdivp2dashboard">{{$totalmenuitems}} </p>
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div id="usercards">

        <div class="userscard">
            <!-- <div> -->
            <h2>Lowest Burger Price</h2>

            <p class="menulatestburgerdivp2dashboard">${{ $minitemprice}}</p>
            <!-- </div> -->
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div id="usercards">

        <div class="userscard">
            <!-- <div> -->
            <h2>Highest Burger Price</h2>

            <p class="menulatestburgerdivp2dashboard">${{ $maxitemprice}}</p>
            <!-- </div> -->
        </div>
    </div>
</section>
<main>
    <!-- Menu add to cart -->
    @if(session()->has('addtocart'))
    @if(Session::get('addtocart') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> Your Item has been added to cart.
    </div>
    @elseif(Session::get('addtocart') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error during forwarding your query.
    </div>
    @endif
    @endif

    <div id="usercards">
        <h3>Menu</h3>
        @foreach($menutable as $menutable)
        <div class="userscard">
            <form method="POST" action="/addtocart">
                @csrf
                <div>
                    <img src="..\Images\burguer1.png" alt="">
                    <p class="menulatestburgerdivpdashboard">{{$menutable->itemname}}</p>
                    <p class="menulatestburgerdivp2dashboard">${{$menutable->price}}</p>
                    <p class="menulatestburgerdivp2dashboard">{{$menutable->description}}</p>
                    <p class="menulatestburgerdivp2dashboard">{{$menutable->nutrientfacts}}</p>
                    <input type="hidden" name="hiddenitemname" value="{{$menutable->itemname}}">
                    <input type="hidden" name="hiddenitemprice" value="{{$menutable->price}}">
                    <input type="hidden" name="hiddenitemid" value="{{$menutable->MenuID}}">
                    <input type="number" name="menuitemquantity" class="menuquantity" value="1" min="1" required>
                </div>
                <p id="userbuttoneffect">
                    <button id="menuitemedit" name="addtocart" type="submit"> Add to Cart
                    </button>
                    <!-- </a> -->
                </p>
            </form>
        </div>
        @endforeach
    </div>

</main>

</html>