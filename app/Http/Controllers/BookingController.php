<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trip;
use App\Models\buse;
use App\Models\booking;

class BookingController extends Controller
{
    public function bookingPage ($id) {

        $trip = trip::where('id',$id)
                ->where('username',session('username'))
                ->first();

        $bus = buse::where('id',$trip->bus_id)
                    ->where('username',session('username'))
                    ->first();

        
        return view('booking-page',compact('trip','bus'));
    }

    public function isSeatAlreadyBooked ($seatId,$tripId) {

        $tripTableData = trip::where('id',$tripId)
                             ->value('booked_seats');

        $tripTableIds = $tripTableData ? json_decode($tripTableData) : null;

        $tripTableCheck = $tripTableIds ? in_array($seatId,$tripTableIds) : null; //false 

        $bookTableData = booking::where('trip_id',$tripId)->pluck('booked_seat_ids');

        $bookTableCheck ;

        if ($bookTableData) {
            $bookTableIds = [];

            foreach ($bookTableData as $key => $value) {
                $valueArray = json_decode($value);
                $bookTableIds = array_merge($bookTableIds,$valueArray);
            }

            $bookTableCheck = $bookTableIds ? in_array($seatId,$bookTableIds) : null;


        } else {
            $bookTableCheck = false;
        }


        if ( $bookTableCheck === false && $tripTableCheck === false ) { //
            return false;
        } else if ( $bookTableCheck === null && $tripTableCheck === null ){
            return false;
        } else {
            return true;
        }

    }

    public function bookingStore (Request $request) {
        $data = $request->all();
        $trip = trip::find($data['trip-id']);
        $tripFare = $trip->price;
        // dd($data);


        // $this->isSeatAlreadyBooked ($data['selected-seats'],$data['trip-id']);
        
        foreach (json_decode($data['selected-seats']) as $seat) {
            $seatsResponses[$seat] = $this->isSeatAlreadyBooked($seat,$trip->id);
        }

        $trueResponseRecords = [];
        foreach ($seatsResponses as $key => $value) {
            if ($value === true) {
                // $trueResponseRecords.array_push($key);
                array_push($trueResponseRecords,$key);
            }
        }

        if (empty($trueResponseRecords)) {

            if ($trip->booked_seats != 0) {
                $booked_seats_arr = array_merge(json_decode($trip->booked_seats),json_decode($data['selected-seats']));
                $trip->booked_seats = json_encode($booked_seats_arr);
            } else {
                $trip->booked_seats = $data['selected-seats'];
            }
    
            $trip->booked_seats_count = $trip->booked_seats_count + count( json_decode($data['selected-seats']) );
            $trip->save();
            dd($data);
            booking::create([
                'host_username' => session('username'),
                'trip_id' => $data['trip-id'],
                'bus_id' => $data['bus-id'],
                'passenger_id' => '',
                'passenger_name' => $data['passenger-name'],
                'booked_seat_ids' => $data['selected-seats'],
                'seats_booked' => count(json_decode($data['selected-seats'])),
                'booking_status' => 'success',
                'fare' => $data['fare'],
                'booked_by' => 'Owner',
                'payment_mode' => 'Cash',
                'payment_status' => 'success',
                'transaction_id' => '',
                'mobile_no' => $data['mobile'],
                'email' => $data['email']
            ]);
    
            return redirect()->route('booking.manage', $data['trip-id']);

        } else {
            echo "This is are already Booked : ";
            foreach ($trueResponseRecords as $key => $value) {
                echo $value;
            }
        }
    }
}
