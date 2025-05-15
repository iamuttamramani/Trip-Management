<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buse;
use App\Models\trip;
use App\Models\booking;
use Carbon\Carbon;

class tripsController extends Controller
{
    //

    public function routesPage() {
        $today = Carbon::today()->toDateString();
        // $trips = trip::where('username',session('username'))->get();
        $todayTrips = trip::where('username',session('username'))
                        ->where('deprature_date',$today)->get();
        foreach ($todayTrips as $trip ) {
            $bus = buse::find($trip -> bus_id);
            $trip -> bus_name = $bus -> bus_name;
            $trip -> bus_number = $bus -> state_code . " "
                                . $bus -> region_code . " "
                                . $bus -> vehicle_alfa_code . " "
                                . $bus -> vehicle_num_code ;              
        }
        // dd($todayTrips); 
        return view('routes',compact('todayTrips'));
    }



    public function tripCreate() {
        $buses = buse::where('username',session('username'))->get();
        // dd($buses);
        return view('trip-create',compact('buses'));
    }

    public function tripStore(Request $request) {
        $trip = $request -> all();
        // dd($trip);
        $bus = buse::find($trip['bus_id'])->first();
        // dd(
        //     $trip['deprature_date']. " " . $trip['deprature_time'],
        //     "",
        //     " arrival_date " . $trip['arrival_date'],
        //     " arrival_time " . $trip['arrival_time']

        // );
        trip::create([
            'username' => session('username'),
            'bus_id' => $trip['bus_id'],
            'from' => $trip['from'],
            'deprature_datetime' => $trip['deprature_date'] . " " . $trip['deprature_time'],
            'deprature_date' => $trip['deprature_date'],
            'deprature_time' => $trip['deprature_time'],
            'to' => $trip['to'],
            'arrival_datetime' => $trip['arrival_date'] . " " . $trip['arrival_time'],
            'arrival_date' => $trip['arrival_date'],
            'arrival_time' => $trip['arrival_time'],
            'total_seats' => $bus['seats'],
            'price' => $trip['price']
        ]);

        // dd(" is Trip created ?");

        return redirect()->route('routes');
    }

    public function bookingManagePage ($trip) {
        $this->trip = $trip; 
        
        return view('booking-manage-page',['bus' => $this->bus, 'trip' => $this->trip]);
    }

    public function bookingManage($tripId) {
        $id = $tripId;
        $trip = trip::where('id',$id)
                    ->where('username',session('username'))
                    ->first();
        // dd($trip);

        $busId = $trip->bus_id;
        $bus = buse::where('id',$busId)
                        ->where('username',session('username'))
                        ->first();
        // dd($trip,$bus);

        $bookings = booking::where('trip_id',$trip->id)
                ->where('host_username',session('username'))
                ->get();
        // dd($bookings);

        return view('booking-manage-page',compact('trip','bus','bookings'));
    }
}
