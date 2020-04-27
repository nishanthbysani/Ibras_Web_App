@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section></section>
<section></section>
<section></section>
<main><br>
    <div class="row" style="text-align:center">
        <h2>Order Reviews</h2>
    </div>
    <div class="row">
        <input type="button" value="Pending" name="pending" class="addmenubutton" onclick="location.href='/adminreview/pending'">
        <input type="button" value="Completed" name="completed" class="addmenubutton" onclick="location.href='/adminreview/completed'">
    </div>
    <br>
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Feedback ID</th>
                <th>Order ID</th>
                <th>Comments</th>
                <th>Ratings</th>
                <th>User ID</th>
                <th>Feedback Time</th>
                <th>Feedback Provided?</th>

            </tr>
            @php $count=0; @endphp
            @foreach ($reviewitems as $reviewitems)
            <tr>
                <td>{{$reviewitems->FeedbackID}}</td>
                <td>
                    {{$reviewitems->OrderID}}
                </td>
                <td>
                    @if(empty( $reviewitems->Comments))
                    {{'null'}}
                    @else
                    {{$reviewitems->Comments}}
                    @endif
                </td>
                <td>
                    @if(empty( $reviewitems->Ratings))
                    {{'null'}}
                    @else
                    {{$reviewitems->Ratings}}
                    @endif
                </td>
                <td>{{$reviewitems->username}}</td>
                <td>{{$reviewitems->feedbacktime}}</td>
                <td>

                    @if($reviewitems->isfeedbackprovided==0)
                    {{'Pending'}}
                    @else
                    {{'Completed'}}
                    @endif
                </td>
                @php $count = $count + 1; @endphp
            </tr>
            @endforeach
            @php
            if ($count == 0) {
            echo "<tr>
                <td colspan='7' align='center'>No Rows to Display</td>
            </tr>";
            }

            @endphp
        </table>
    </div>
</main>
@endsection