@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section class='sectionclass'>


</section>
<section class='sectionclass'>
    <div id="usercards">
        <div class="userscard">
            <!-- <div> -->
            <h2>Total Users</h2>

            <p class="menulatestburgerdivp2dashboard">{{$totalusers}} </p>
        </div>
    </div>
</section>
<section class='sectionclass'>

</section>
<main>
    <div id="usercards" class="userstable">
        <h3>Users</h3>
        @foreach($userslist as $userslist)
        <div class="userscard">
            <div class="myprofileclass" id="myprofilephoto"><i class="fas fa-user fa-6x"></i></div>
            <h4>{{$userslist->FullName}}</h4>
            <p>
                <p class='bold'>Email ID: </p>{{$userslist->emailid}}
            </p>
            <p class="userstitle">
                <p class='bold'>Occupation: </p> {{$userslist->occupation}}
            </p>
            <p>
                <p class='bold'>Works at:</p>{{$userslist->worksfor}}
            </p>
            <p>
                <p class='bold'>City: </p>{{$userslist->city}}
            </p>
            <p>
                <p class='bold'>Country: </p>{{$userslist->country}}
            </p>
            <p>
                <p class='bold'>Tel: </p>{{$userslist->phonenumber}}
            </p>
            <div style="margin: 24px 0;">
                <a href="#" id="usera"><i class="fab fa-dribbble"></i></a>
                <a href="#" id="usera"><i class="fab fa-twitter"></i></a>
                <a href="#" id="usera"><i class="fab fa-linkedin"></i></a>
                <a href="#" id="usera"><i class="fab fa-facebook"></i></a>
            </div>
            <p id="userbuttoneffect"><button id="userbuttons">Contact</button></p>
        </div>
        @endforeach
    </div>
</main>
@endsection