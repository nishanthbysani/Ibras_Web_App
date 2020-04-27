@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section>
    <div id="usercards">
        <div class="userscard">
            <!-- <div> -->
            <h2>Total Menu Items</h2>

            <p class="menulatestburgerdivp2dashboard">{{$totalmenuitems}} </p>
        </div>
    </div>

</section>
<section>
    <div id="usercards">

        <div class="userscard">
            <!-- <div> -->
            <h2>Lowest Burger Price</h2>

            <p class="menulatestburgerdivp2dashboard">${{ $minitemprice}}</p>
            <!-- </div> -->
        </div>
    </div>
</section>
<section>
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
    <button id="menumyBtn" class="addmenubutton" onclick='document.getElementById("menumyModal").style.display = "block"'>Add Item</button>

    <!-- Add Menu ItemModal -->
    <div id="menumyModal" class="menumodal">
        <!-- Add Menu ItemModal content -->
        <div class="menumodal-content">
            <span class="menuclose"><button class='closebutton' onclick='document.getElementById("menumyModal").style.display = "none"'><i class="far fa-window-close fa-2x"></i></button></span>
            <h3>Add Item</h3>
            <form onsubmit="return" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemname" class="addmenulabel">Item Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemname" name="menuitemname" class="addmenufield" placeholder="Item Name" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemprice" class="addmenulabel">Item Price</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemprice" name="menuitemprice" class="addmenufield" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemdescription" class="addmenulabel">Item Description</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemdescription" name="menuitemdescription" class="addmenufield"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemnutrientfacts" class="addmenulabel">Nutrient Facts</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemnutrientfacts" name="menuitemnutrientfacts" class="addmenufield"><br>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Add Item" class="addmenubutton">
                </div>
                @php
                if (!empty($additemerror)) {
                echo "<p>" . $additemerror . "</p>";
                }
                @endphp
            </form>
        </div>

    </div>




    <!-- Display Menu items -->
    <div id="usercards">
        <h3>Menu</h3>
        @foreach($menutable as $menutable)
        <div class="userscard">
            <div>
                <img src="..\Images\burguer1.png" alt="">
                <p class="menulatestburgerdivpdashboard">{{$menutable->itemname}}</p>
                <p class="menulatestburgerdivp2dashboard">${{$menutable->price}}</p>
                <p class="menulatestburgerdivp2dashboard">{{$menutable->description}}</p>
                <p class="menulatestburgerdivp2dashboard">{{$menutable->nutrientfacts}}</p>
            </div>
            <p id="userbuttoneffect"><a href="/adminmenu/{{$menutable->MenuID}}"><button id="menuitemedit"> Edit
                    </button></a></p>
        </div>
        @endforeach
    </div>
    <!-- Edit Menu Item -->

    @if ( isset($menuitems))

    <div id="updatemenumyModal" class="updatemenumodal">
        <!-- Modal content -->
        <div class="updatemenumodal-content">
            <span class="updatemenuclose"><button class='closebutton' onclick='document.getElementById("updatemenumyModal").style.display = "none"'><i class="far fa-window-close fa-2x"></i></button></span>
            <h3>Update Item</h3>
            <form onsubmit="return" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemname" class="addmenulabel">Item Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemname" name="updatemenuitemname" class="addmenufield" placeholder="Item Name" value="{{$menuitems[0]->itemname}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemprice" class="addmenulabel">Item Price</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemprice" name="updatemenuitemprice" class="addmenufield" value="{{$menuitems[0]->price}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemdescription" class="addmenulabel">Item Description</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemdescription" name="updatemenuitemdescription" class="addmenufield" value="{{$menuitems[0]->description}}"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="menuitemnutrientfacts" class="addmenulabel">Nutrient Facts</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="menuitemnutrientfacts" name="updatemenuitemnutrientfacts" class="addmenufield" value="{{$menuitems[0]->nutrientfacts}}"><br>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Delete" name="deletemenuitem" class="addmenubutton updatedelete">
                    <input type="submit" value="Update" name="updatemenuitem" class="addmenubutton ">

                </div>
                @php
                if (!empty($additemerror)) {
                echo "<p>" . $additemerror . "</p>";
                }
                @endphp
            </form>
        </div>
    </div>
    @endif
</main>


@if(isset($menuitems))
@php echo '<script>
    updatebuttonredirect()
</script>'; @endphp
@endif
@endsection