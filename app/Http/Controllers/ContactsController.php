<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    function show()
    {
        $data =Contact::all();
        return view('contacts',['users'=>$data]);
    }
}
