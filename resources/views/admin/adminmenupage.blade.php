@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
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
    <!-- Add Item to Menu -->
    @if(session()->has('addtomenu'))
    @if(Session::get('addtomenu') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> New Item has been added to the menu list.
    </div>
    @elseif(Session::get('addtomenu') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while adding new item to the menu list.
    </div>
    @endif
    @endif
    <!-- Delete Item from Menu -->
    @if(session()->has('deletemenuitem'))
    @if(Session::get('deletemenuitem') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> Item has been removed from the menu list.
    </div>
    @elseif(Session::get('deletemenuitem') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while deleting item from the menu list.
    </div>
    @endif
    @endif
    <!-- Update Menu Item -->
    @if(session()->has('updatemenuitem'))
    @if(Session::get('updatemenuitem') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> An Item has been updated in the menu list.
    </div>
    @elseif(Session::get('updatemenuitem') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while updating an item in the menu list.
    </div>
    @endif
    @endif
    <button id="menumyBtn" class="addmenubutton" onclick='document.getElementById("menumyModal").style.display = "block"'>Add Item</button>

    <!-- Add Menu ItemModal -->
    <div id="menumyModal" class="menumodal">
        <!-- Add Menu ItemModal content -->
        <div class="menumodal-content">
            <span class="menuclose"><button class='closebutton' onclick='document.getElementById("menumyModal").style.display = "none"'><i class="far fa-window-close fa-2x"></i></button></span>
            <h3>Add Item</h3>
            <form onsubmit="return" method="POST" action="/adminmenu/addnewitem">
                @csrf
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
            <form onsubmit="return" method="POST" action="/adminmenu/editmenuitem">
                @csrf
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
                <input type="hidden" name="updatemenuid" value="{{$menuitems[0]->MenuID}}">
                <br>
                <div class="row">
                    <input type="submit" value="Delete" name="editmenuitem" class="addmenubutton updatedelete">
                    <input type="submit" value="Update" name="editmenuitem" class="addmenubutton ">

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