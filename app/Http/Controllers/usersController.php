<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;

class usersController extends Controller
{
    public function checkUser($email) {
        $findUser = usersModel::where('email',$email)->first();
        if ($findUser) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function registrationPage() {
        $users = usersModel::all();
        // dd($users);
        return view('register');
    }

    public function loginPage() {
        // $users = usersModel::all();
        // dd($users);
        return view('login');
    }

    public function submitRegister(Request $request) {
        $data = $request -> all();
        $isUser = $this->checkUser($data['email']);
        if ($isUser) {
            return "You Are Already Registered";
        }
        else {
            usersModel::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['psw']
            ]);
            session(['username' => $data['email']]);
            return  "You Are Registered Successfully" . session('username');
        }
    }

    public function submitLogin(Request $request) {
        $data = $request -> all();
        $user = usersModel::where('email', $data['email'])->first();
        if ($user) {
            if ($user->password == $data['psw']) {
                session(['username' => $data['email']]);
                return redirect()->route('home');
            } 
        }
        else {
            // usersModel::create([
            //     'name' => $data['name'],
            //     'email' => $data['email'],
            //     'password' => $data['psw']
            // ]);
            return  "You Don't have an Account, Please Register First";
        }
        dd($data);
    }
}
