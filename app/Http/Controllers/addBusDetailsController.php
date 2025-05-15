<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addBusDetailsController extends Controller
{
    //
    public function formSubmit(Request $request) {
        $data = $request -> all();
        dd($data);
    }
}
