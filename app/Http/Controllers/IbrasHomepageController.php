<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\Email;

use App\Contact;
use App\UsersIbras;

class IbrasHomepageController extends Controller
{
    //
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
    public function storelogincheck()
    {
        $usersibras = new UsersIbras();
        
    }
}
