<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Users extends Controller
{
    //
    function list()
    {
        return User::all();
    }

    function insert(Request $req)
    {
        $u = New User;
        $u->name=$req->name;
        $u->email=$req->email;
        $u->address=$req->address;
        
        if($u->save())
        {
            return "New User Added !";
        }

    }
}
