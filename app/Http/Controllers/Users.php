<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
class Users extends Controller
{
    //
    function list()
    {
        return User::all();
    }

    function insert(Request $req)
    {
        $valid= Validator::make($req->all(),[
            'name'=>"required",
            'email'=>"required",
            'address'=>"required"
        ]);
            if($valid->fails())
            {
                return response()->json(['error'=>$valid->errors()],401);
            }
        $u = New User;
        $u->name=$req->name;
        $u->email=$req->email;
        $u->address=$req->address;
        
        if($u->save())
        {
            return "New User Added !";
        }

    }

    function update(Request $req)
    {
        $u = User::find($req->id);
        $u->email=$req->email;
        if($u->save())
        {
            return ["Result"=>"Success","msg"=>"data updated"];
        }
    }
}
