<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;

class profileController extends Controller
{
    public function profilePage() {
        if (session('username')) {
            $user = usersModel::where('email',session('username'))->first();
            return view('profile',compact('user'));
        }else {
            $user = usersModel::where('email','ramaniuttam412@gmail.com')->first();
            return view('profile',compact('user'));
        }
    }

    public function profileUpdate(Request $request) {
        $data = $request -> all();
        $user = usersModel::where('email',$data['email'])->first();
        // if(session('username')==data['email']){
            if ($user) {
                $user->name = $data['name'];
                $user->password = $data['password'];
            }
        // }
        return "Update Successfully " . $data['email'];
    }
}
