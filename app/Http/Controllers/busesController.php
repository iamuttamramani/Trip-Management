<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buse;

class busesController extends Controller
{
    //
    public function buses() {
        $myBuses = buse::where('username',session('username'))->get();
        return view('buses',compact('myBuses'));
        // $myBus = buse::all();
        // // echo $myBus->bus_name;
        // foreach ($myBus as $bus ) {
        //     echo $bus->bus_name . "<br>"; 
        // }
        // return view('buses',compact('myBuses'));
    }

    public function updateBus() {
        return view('bus-update');
    }
}
