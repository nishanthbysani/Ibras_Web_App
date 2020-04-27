@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section></section>
<section></section>
<section></section>
<main><br>
    <div class="row" style="text-align:center">
        <h2>Inventory</h2>
    </div>

    <br>
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Inventory ID</th>
                <th>Stock Name</th>
                <th>Quantity</th>
            </tr>
            @php $count=0; @endphp
            @foreach ($reviewitems as $reviewitems)
            <tr>
                <td>{{$reviewitems->inventoryid}}</td>
                <td>{{$reviewitems->stockname}}</td>
                <td>{{$reviewitems->quantity}}</td>

                @php $count = $count + 1; @endphp
            </tr>
            @endforeach

            @if ($count == 0) {
            echo "<tr>
                <td colspan='9'>No Rows to Display</td>
            </tr>";
            }
            @endif
        </table>
    </div>
</main>
<footer></footer>
</body>
<script type="text/Javascript" src="../JS/script.js"></script>

</html>