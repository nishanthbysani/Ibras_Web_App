@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section></section>
<section></section>
<section></section>
<main><br>
    <div class="row" style="text-align:center">
        <h2>Enquiries</h2>
    </div>
    <div class="row">
        <input type="button" value="Pending" name="pending" class="addmenubutton" onclick="location.href='/adminenquiry/pending'">
        <input type="button" value="Completed" name="completed" class="addmenubutton" onclick="location.href='/adminenquiry/completed'">
    </div>
    <br>
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Contact ID</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Enquiry Time</th>
                <th>Resolution Status</th>
                <th>Resolved By</th>
                <th>Comments</th>
                <th>Last Updated</th>
            </tr>
            @php $count=0; @endphp
            @foreach ($reviewitems as $reviewitems)
            <tr>
                <td>{{$reviewitems->ContactID}}</td>
                <td>{{$reviewitems->Email}}</td>
                <td>{{$reviewitems->Subject}}</td>
                <td>{{$reviewitems->Message}}</td>
                <td>{{$reviewitems->enquiretime}}</td>
                <td>@if($reviewitems->isresolved==0)
                    {{'Not Resolved'}}
                    @else
                    {{'Resolved'}}
                    @endif
                </td>
                <td> @if(empty( $reviewitems->resolvedby))
                    {{'null'}}
                    @else
                    {{$reviewitems->resolvedby}}
                    @endif
                </td>
                <td>@if(empty( $reviewitems->resolutioncomments))
                    {{'null'}}
                    @else
                    {{$reviewitems->resolutioncomments}}
                    @endif
                </td>
                <td>{{$reviewitems->lastupdated}}</td>
                @php $count = $count + 1; @endphp
            </tr>
            @php
            if ($count == 0) {
            echo "<tr>
                <td colspan='9'>No Rows to Display</td>
            </tr>";
            } @endphp
            @endforeach
        </table>
    </div>
</main>
@endsection