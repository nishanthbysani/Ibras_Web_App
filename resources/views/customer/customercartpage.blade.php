@extends('layouts.usertemplate')
@extends('customer.customersidenavbar')
@extends('customer.dashboardfooter')
@section('content')
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Cart Total</h2>
            <h4>${{$carttotal}}</h4>
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Cart Quantity</h2>

            <h4>{{$cartquantity}}</h4>
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Cart Discount (5%)</h2>

            <h4>${{$carttotal*0.05}}</h4>
        </div>
    </div>
</section>
<main>
    @if(session()->has('deleteitemcart'))
    @if(Session::get('deleteitemcart') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> Your Item has been removed from cart.
    </div>
    @elseif(Session::get('deleteitemcart') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while deleting the item from cart.
    </div>
    @endif
    @endif
    @if(session()->has('ordercart'))
    @if(Session::get('ordercart') == 'success')
    <div class="alert success" id="alertpopuporder">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopuporder').style.display='none';">&times;</span>
        <strong>Success!</strong> Your Order has been placed.
    </div>
    @elseif(Session::get('ordercart') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while placing the order.
    </div>
    @endif
    @endif
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Menu ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Item Price</th>
                <th>Delete</th>
            </tr>
            @php $count = 0;@endphp
            @foreach($carttable as $carttable)
            <tr>
                <form method="POST" action="/deletefromcart">
                    @csrf
                    <td>{{$carttable->MenuID}}</td>
                    <input type="hidden" name="cartmenuid" value="{{$carttable->MenuID}}">
                    <td>{{$carttable->itemname}}</td>
                    <input type="hidden" value="{{$carttable->itemname}}" name="cartitemname">
                    <td>{{$carttable->Quantity}}</td>
                    <input type="hidden" value="{{$carttable->Quantity}}" name="cartquantity">
                    <td>${{$carttable->itemprice}}</td>
                    <td> <button id="menuitemedit" name="removefromcart" type="submit"> Remove
                        </button></td>
                </form>
                @php $count = $count + 1; @endphp
            </tr>
            @endforeach
            @php
            if ($count == 0) {
            echo "<tr>
                <td colspan='5'>No Rows to Display</td>
            </tr>";
            }
            @endphp
        </table>
    </div>

    <button onclick="window.location.href = '/placeorder'" class="addmenubutton">Order Now</button>

</main>

@endsection