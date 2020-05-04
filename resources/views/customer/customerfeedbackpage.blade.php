@extends('layouts.usertemplate')
@extends('customer.customersidenavbar')
@extends('customer.dashboardfooter')
@section('content')
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Total Feedback</h2>
            <h4>{{$totalreviewitems}}</h4>
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Completed Feedback</h2>

            <h4>{{$completedreviewitems}}</h4>
        </div>
    </div>
</section>
<section class='sectionclass'>
    <div class="userscard">
        <div>
            <h2>Pending Feedback</h2>

            <h4>{{$pendingreviewitems}}</h4>
        </div>
    </div>
</section>


<main><br>
    @if(session()->has('feedbackgiven'))
    @if(Session::get('feedbackgiven') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> Feedback Successfully Provided.
    </div>
    @elseif(Session::get('feedbackgiven') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while updating feedback.
    </div>
    @endif
    @endif
    <br>
    <div class="row" style="text-align:center">
        <h2>Order Reviews</h2>
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
            @foreach ($feedbackdata as $reviewitems)
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
                    @for ($i = 0; $i < 5; $i++) <span class="fa fa-star"></span>
                    @endfor
                    @else
                        @for ($i = 0; $i < $reviewitems->Ratings; $i++)
                            <span class="fa fa-star ratingschecked"></span>
                        @endfor
                            @for ($i = 0; $i < 5-$reviewitems->Ratings; $i++)
                                <span class="fa fa-star "></span>
                                @endfor
                                @endif
                </td>
                <td>{{$reviewitems->UserID}}</td>
                <td>{{$reviewitems->feedbacktime}}</td>
                <td>

                    @if($reviewitems->isfeedbackprovided==0)
                    <button onclick="window.location.href = '/customerfeedback/{{$reviewitems->FeedbackID}}'" class="addmenubutton" id="ratenowbutton">Rate Now</button>
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
    @if ( isset($feedbackdataitem))

    <div id="updatemenumyModal" class="updatemenumodal feedbackmodal">
        <!-- Modal content -->
        <div class="updatemenumodal-content">
            <span class="updatemenuclose"><button class='closebutton' onclick="window.location.href = '/customerfeedback'"><i class="far fa-window-close fa-2x"></i></button></span>
            <h3>Feedback</h3>
            <form onsubmit="return" method="POST" action="/customerfeedback/updatefeedback">
                @csrf
                <div class="row">
                    <div class="col-25">
                        <label for="ordernumber" class="addmenulabel">Order ID</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="ordernumber" name="feedbackorderid" class="addmenufield" placeholder="Item Name" value="{{$feedbackdataitem[0]->OrderID}}" readonly="readonly"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="rate" class="addmenulabel">Rating</label>
                    </div>
                    <div class="col-75">
                        <div class="rate">
                            <input type="radio" id="star5" name="feedbackorderrate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="feedbackorderrate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="feedbackorderrate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="feedbackorderrate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="feedbackorderrate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="feedbackcomments" class="addmenulabel">Item Description</label>
                    </div>
                    <div class="col-75">
                        <textarea name="feedbackordercomments" id="feedbackordercomments" rows="6" maxlength="1000" placeholder="Enter your comments" required></textarea>
                        <br>
                    </div>
                </div>
                <br>
                <div class="row">
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

@endsection