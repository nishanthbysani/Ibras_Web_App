@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section></section>
<section></section>
<section></section>
<main><br>
    <div class="row" style="text-align:center">
        <h2>Staff Timesheet</h2>
    </div>

    <br>
    <div class="tableoverflowdiv">
        <table id="review">
            <tr>
                <th>Staff ID</th>
                <th>Staff Name</th>
                <th>Hours Clocked</th>
                <th>Hours to be Clocked</th>
            </tr>
            @php $count=0; @endphp
            @foreach ($reviewitems as $reviewitems)
            <tr>
                <td>{{$reviewitems->staffid}}</td>
                <td>{{$reviewitems->staffname}}</td>
                <td>{{$reviewitems->hoursclocked}}</td>
                <td>{{$reviewitems->hourstobeclocked}}</td>

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
@endsection