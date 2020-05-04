@extends('layouts.usertemplate')
@extends('customer.customersidenavbar')
@extends('customer.dashboardfooter')
@section('content')
<section class='sectionclass'></section>
<section class='sectionclass'></section>
<section class='sectionclass'></section>
<main><br>
    <div class="row" style="text-align:center">
        <h2>Order History</h2>
    </div>

    <br>
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Order Number</th>
                <th>Order Price</th>
            </tr>
            @php $count = 0; @endphp
            @foreach($orderslist as $orderslist)

            <tr>
                <td>{{$orderslist->OrderID}}</td>
                <td>{{$orderslist->OrderPrice}}</td>
                @php $count = $count + 1; @endphp
            </tr>
            @endforeach
            @php
            if ($count == 0) {
            echo "<tr>
                <td colspan='2'>No Rows to Display</td>
            </tr>";
            }
            @endphp
        </table>
    </div>
</main>
@endsection