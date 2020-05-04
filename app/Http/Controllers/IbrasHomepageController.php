<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\Email;

use App\Contact;
use App\UsersIbras;

use Illuminate\Support\Facades\DB;

class IbrasHomepageController extends Controller
{

    public function gotoinicio()
    {
        return view('inicio');
    }
    public function gotosobrenostoros()
    {
        return view('sobrenosotros');
    }
    public function gotomenu()
    {
        return view('menu');
    }
    public function gotocontacto()
    {
        return view('contacto');
    }


    public function storecontacto()
    {
        $contact = new Contact();
        $contact->Name = request('Name');
        $contact->Email = request('Email');
        $contact->Subject = request('Subject');
        $contact->Message = request('Message');
        $contact->timestamps = false;
        error_log($contact);
        $save = $contact->save();
        // ?if statement
        if ($save) {
            session()->flash('querystatus', 'success');
            error_log("Data Saved");
        } else {
            session()->flash('querystatus', 'unsuccess');
            error_log("Data not Saved");
        }
        return redirect('/contacto');
    }
    public function storelogincheck(Request $request)
    {
        // Login Form Check
        $username = request('username');
        $password = request('password');
        $request->validate([
            'username' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'password' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,10}$/',
        ]);
        // Check if the username and password is in the DB
        $numberofusers = UsersIbras::where("Username", $username)->where("Password", $password)
            ->count('UserID');
        if ($numberofusers == '') {
            $numberofusers = 0;
        }
        if ($numberofusers == 1) {
            $userids = UsersIbras::where("Username", $username)->where("Password", $password)
                ->first();
            $userid = $userids->UserID;
            $usertype = $userids->RoleID;
            session()->flush();
            session()->put('loggedinusername', $username);
            session()->put('loginstatus', 'True');
            session()->put('loggedinuserid', $userid);
            if ($usertype == 2) {
                return redirect('/adminhome');
            } else if ($usertype == 1) {
                return redirect('/customerhome');
            }
        } else {
            session()->flash('loginsuccessflag', 'False');
            return redirect('/inicio');
        }
    }
    public function storeregistrationcheck(Request $request)
    {
        $fullname = request('registerfullname');
        $username = request('registeremail');
        $password = request('registerpassword');
        $repeatpassword = request('registerrepeatpassword');
        $address = request('registeraddress');
        $usertype = request('registerusertype');

        // Add Validation
        $request->validate([
            'registerfullname' => 'required|alpha',
            'registerpassword' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,10}$/',
            'registerrepeatpassword' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,10}$/|same:password',
            'registeremail' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/|unique:App\UsersIbras,UserName',
            'registeraddress' => 'required',
            'registerusertype'=>'required'
        ]);
        $numberofusers = UsersIbras::where("Username", $username)
            ->count('UserID');

        if ($numberofusers != 0) {
            // User Exists already
            error_log('user already exists');
        } else {
            // Add to Register table
            $data =
                ['Name' => $fullname, 'Address' => $address, 'UserName' => $username, 'Password' => $password, 'roleid' => $usertype];
            DB::table('registration')->insert($data);
            $latestRegID = DB::table('registration')->select('RegID')->Max('RegID');
            // Add to Usersibras table
            $data =
                ['Name' => $fullname,  'Username' => $username, 'Password' => $password, 'RegID' => $latestRegID, 'RoleID' => $usertype];
            DB::table('usersibras')->insert($data);
            $latestUserID = DB::table('usersibras')->select('UserID')->Max('UserID');
            // Add to Profile Table
            $data =
                ['UserID' => $latestUserID,  'FullName' => $fullname, 'emailid' => $username, 'address' => $address, 'city' => $address, 'country' => 'USA'];
            DB::table('profile')->insert($data);
        }
        session()->flush();
        session()->put('loggedinusername', $username);
        session()->put('loginstatus', 'True');
        session()->put('loggedinuserid', $latestUserID);
        if ($usertype == 2) {
            return redirect('/adminhome');
        } else if ($usertype == 1) {
            return redirect('/customerhome');
        }
    }
    public function indexlogout()
    {
        session()->flush();
        return redirect('/inicio');
    }
}
