@extends('layouts.usertemplate')
@extends('customer.customersidenavbar')
@extends('customer.dashboardfooter')
@section('content')
<section></section>
<section></section>
<section></section>
<main>
    @if(session()->has('profileupdated'))
    @if(Session::get('profileupdated') == 'success')
    <div class="alert success" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Success!</strong> Profile has been updated.
    </div>
    @elseif(Session::get('profileupdated') == 'unsuccess')
    <div class="alert unsuccess" id="alertpopup">
        <span class="alertclosebtn" onclick="document.getElementById('alertpopup').style.display='none';">&times;</span>
        <strong>Error!</strong> Error while updating profile.
    </div>
    @endif
    @endif
    <div id="dashboardadminright">
        <div id="dashboardpadding">
            <h4>My Profile</h4>
            <div class="myprofileclass" id="myprofilephoto"><i class="fas fa-user fa-6x"></i></div> <br><br><br>
            <!-- <div class="myprofileclass"><h4>Manager</h4></div> -->
            <form method="POST" action="/customerprofileupdate">
                @csrf
                <div class="myprofileclass"><label>Full Name</label> <br><input type="text" name="profilefullname" value="{{$profile[0]->FullName}}" min='1' maxlength='25' pattern="[a-zA-Z ]*" required></div>
                <div class="myprofileclass"><label>Email ID</label> <br><input type="text" name="profileemailaddress" value="{{$profile[0]->emailid}}" readonly></div>
                <div class="myprofileclass"><label>Address</label><br> <input type="text" name="profileaddress" value="{{$profile[0]->address}}" pattern="[a-zA-Z ]*"></div>
                <div class="myprofileclass"><label>City</label><br> <input type="text" name="profilecity" value="{{$profile[0]->city}}" pattern="[a-zA-Z ]*" required></div>
                <div class="myprofileclass"><label>Country</label><br> <input type="text" name="profilecountry" value="{{$profile[0]->country}}" pattern="[a-zA-Z ]*" required>
                </div>
                <div class="myprofileclass"><label>Phone Number</label><br> <input type="tel" name="profiletelephone" value="{{$profile[0]->phonenumber}}" pattern="([0-9]{3}[-]*[0-9]{3}[-]*[0-9]{4}" required></div>
                <div class="myprofileclass"><label>Occupation</label><br> <input type="tel" name="profileoccupation" value="{{$profile[0]->occupation}}" pattern="[a-zA-Z ]*" required></div>
                <div class="myprofileclass"><label>Works at</label><br> <input type="tel" name="profileworksat" value="{{$profile[0]->worksfor}}" pattern="[a-zA-Z ]*" required></div>
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="myprofileclass" id="myprofilesavebutton"><button type="submit" name="profilesave" id="profilesave">Save</button></div>
            </form>
        </div>
    </div>
</main>
@endsection