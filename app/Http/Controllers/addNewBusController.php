<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buse;
use App\Models\submitBusLayoutSeatsIdsModel;

class addNewBusController extends Controller
{

    public function insertData (Request $request) {
        $data = $request -> all();
        $username = session('username');
        // session(['data' => $data]);
        // session(['username' => $username]);
        $bus_username = strtolower( $data['bus_name'] . $data['vehicle_num_code'] . "U");
        $data['bus_username'] = $bus_username;
        // buse::create([
        //     'username' => $username,
        //     'busUsername' => $bus_username,
        //     'bus_name' => $request -> bus_name,
        //     'state_code' => $request -> state_code,
        //     'region_code' => $request -> region_code,
        //     'vehicle_alfa_code' => $request -> vehicle_alfa_code,
        //     'vehicle_num_code' => $request -> vehicle_num_code,
        //     'bus_type'  => $request -> bus_type,
        //     'seats' => $request -> number_of_seats
        // ]);
        $bus = [
                'username' => $username,
                'bus_username' => $bus_username,
                'bus_name' => $data['bus_name'],
                'state_code' => $data['state_code'],
                'region_code' => $data['region_code'],
                'vehicle_alfa_code' => $data['vehicle_alfa_code'],
                'vehicle_num_code' => $data['vehicle_num_code'],
                'bus_type'  => $data['bus_type'],
                'seats' => $data['number_of_seats'],
                ];        
        return view('bus-layout-berth-seats',compact('bus'));
    }

    // public function addDetails (Request $request, $username, $bus_username) {
    //     $data = array_merge(session('data'),$request->all());
    //     $data['username']=$username; 
    //     $data['bus_username']=$bus_username;
        
    //     $bus = buse::where('username',$username)
    //                 ->where('busUsername',$bus_username)
    //                 ->first();

    //     if ( $bus ) {
    //             $bus->seats = $request->input('number-of-seats');
    //             $bus->seat_type = $request->input('bus-seat-types');
    //             $bus->save();

    //             return view('bus-layout-berth-seats');
    //     }
    //     else {
    //         dd("Bhai, aa username ane bus_username name wali Column is (X) Not Available");
    //     }

    //     dd($data);
    // }


    public function store(Request $request)
    {
        $seats = $request->input('seats');
        $bus = $request->input('bus');
        $message;
        // $username = session('username');
        // $bus_username = $package['bus_username'];

        // For testing purpose - Log the data
        \Log::info('Received seats:', $seats);
        \Log::info('Received seats:', $bus);

        // $encodedSeats = json_encode($seats);
        // dd($request);

        $check=submitBusLayoutSeatsIdsModel::where('username',$bus['username'])
                                         ->where('busUsername',$bus['bus_username'])
                                         ->first();
        // if($bus){
        //     $bus->seatsIds=json_encode($seats);;
        //     $bus->save();
        // }

        if($check){
            // $busNumber = $bus['state_code'] . " " .
            //   $bus['region_code'] . " " .
            //   $bus['vehicle_alfa_code'] . " " .
            //   $bus['vehicle_num_code'];
            // dd($bus);
            // return back()->with('error', " This Bus Is Already Created " . $busNumber);
            $message = "Bus No. " . $bus['state_code'] . " " . $bus['region_code'] . " " . $bus['vehicle_alfa_code'] . " " . $bus['vehicle_num_code'] . " is Already Created! ";
        }
        else {
            buse::create([
                'username' => $bus['username'],
                'busUsername' => $bus['bus_username'],
                'bus_name' => $bus['bus_name'],
                'state_code' => $bus['state_code'],
                'region_code' => $bus['region_code'],
                'vehicle_alfa_code' => $bus['vehicle_alfa_code'],
                'vehicle_num_code' => $bus['vehicle_num_code'],
                'bus_type'  =>  $bus['bus_type'],
                'seats' => $bus['seats'],
                'seatsIds' => json_encode($seats)
            ]);
            $message = "Bus is Created Successfully!";
            // dd($bus);
            // return route('myBuses');
        }


        
        // submitBusLayoutSeatsIdsModel::update();

        return response()->json([
            'success' => true,
            'message' => $message,
            'seats' => $seats,
            'bus' => $bus,
            'redirect' => route('buses')
        ]);
    }

}
